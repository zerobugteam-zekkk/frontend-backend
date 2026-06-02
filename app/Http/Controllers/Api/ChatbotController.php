<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\GroqService;
use App\Services\FlightService;
use App\Models\ChatUser;
use App\Models\ChatMessage;
use Illuminate\Support\Facades\Log;
use App\Models\Faq;
use Illuminate\Support\Str;

class ChatbotController extends Controller
{
    // =========================
    // REGISTER
    // =========================
    public function register(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string',
            'last_name'  => 'required|string',
            'email'      => ['required', 'email', 'ends_with:@gmail.com'],
            'mobile'     => 'required|string',
            'category'   => 'required|string',
        ], [
            'email.ends_with' => 'Email harus menggunakan @gmail.com'
        ]);

        $user = ChatUser::updateOrCreate(
            ['email' => $data['email']],
            $data
        );

        // ✅ Buat token baru, simpan ke DB
        $token = Str::random(64);
        $user->update([
            'user_token'  => $token,
            'token_login_at' => now(),
        ]);

        return response()->json([
            'status'     => 'success',
            'first_name' => $user->first_name,
        ])->cookie(
            'chat_user_token',  // nama cookie
            $token,             // value
            60 * 24,            // menit = 24 jam
            '/',                // path
            null,               // domain
            false,              // secure (true kalau https)
            false               // ✅ httpOnly false agar JS bisa hapus
        );
    }

    // =========================
    // HELPER — ambil user dari cookie
    // =========================
    private function getUserFromCookie(Request $request): ?ChatUser
    {
        $token = $request->cookie('chat_user_token');

        if (!$token) return null;

        $user = ChatUser::where('user_token', $token)->first();

        if (!$user) return null;

        // ✅ Cek expired 24 jam
        if (!$user->token_login_at || now()->diffInHours($user->token_login_at) >= 24) {
            $user->update(['user_token' => null, 'token_login_at' => null]);
            return null;
        }

        return $user;
    }

    // =========================
    // CHAT
    // =========================
    public function chat(
        Request $request,
        GroqService $groq,
        FlightService $flightService
    ) {
        try {
            // ✅ Auth via cookie
            $user = $this->getUserFromCookie($request);

            if (!$user) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }

            $data = $request->validate([
                'message' => 'required|string'
            ]);

            $locale = $request->input('locale', 'id');
            app()->setLocale($locale);

            $message = strtolower($data['message']);
            $message = trim($message);
            $message = preg_replace('/[^a-z0-9\s]/', '', $message);

            // =========================
            // AUTO PING (load history)
            // =========================
            if ($message === 'ping') {
                $history = ChatMessage::where('chat_user_id', $user->id)
                    ->where('created_at', '>=', now()->subHours(24))
                    ->orderBy('created_at')
                    ->get(['message', 'sender']);

                return response()->json([
                    'first_name' => $user->first_name,
                    'history'    => $history
                ]);
            }

            // =========================
            // SIMPAN PESAN USER
            // =========================
            ChatMessage::create([
                'chat_user_id' => $user->id,
                'message'      => $message,
                'sender'       => 'user'
            ]);

            // =========================
            // GREETING DETECTION
            // =========================
            $greetings = [
                'halo', 'hai', 'hi', 'pagi', 'siang', 'malam',
                'assalamualaikum', 'permisi', 'hello',
                'good morning', 'good afternoon', 'good evening',
            ];

            $thanks = ['makasih', 'terima kasih', 'thanks', 'thank you'];

            foreach ($greetings as $greeting) {
                if (str_contains($message, $greeting)) {
                    $responses = $locale === 'en' ? [
                        "Hello {$user->first_name} 👋\nHow may I help you regarding flights or airport facilities?",
                        "Hi {$user->first_name} 😊\nFeel free to ask about flight schedules or airport services.",
                        "Welcome 👋\nIs there any airport information you would like to know?"
                    ] : [
                        "Halo {$user->first_name} 👋\nAda yang bisa saya bantu terkait penerbangan atau fasilitas bandara?",
                        "Hai {$user->first_name} 😊\nSilakan tanyakan informasi penerbangan atau fasilitas bandara ya.",
                        "Selamat datang 👋\nAda informasi bandara yang ingin Anda tanyakan?"
                    ];

                    $reply = collect($responses)->random();
                    ChatMessage::create(['chat_user_id' => $user->id, 'message' => $reply, 'sender' => 'bot']);
                    return response()->json(['reply' => $reply, 'first_name' => $user->first_name]);
                }
            }

            foreach ($thanks as $thank) {
                if (str_contains($message, $thank)) {
                    $responses = $locale === 'en' ? [
                        "You're welcome {$user->first_name} 😊\nHave a pleasant journey ✈️",
                        "My pleasure {$user->first_name} 👋\nHope your flight goes smoothly.",
                        "Thank you for using the airport assistant chatbot {$user->first_name} 😊"
                    ] : [
                        "Sama-sama {$user->first_name} 😊\nSemoga perjalanan Anda menyenangkan ✈️",
                        "Dengan senang hati {$user->first_name} 👋\nSemoga penerbangan Anda lancar.",
                        "Baik {$user->first_name} 😊\nTerima kasih sudah menggunakan layanan chatbot bandara."
                    ];

                    $reply = collect($responses)->random();
                    ChatMessage::create(['chat_user_id' => $user->id, 'message' => $reply, 'sender' => 'bot']);
                    return response()->json(['reply' => $reply, 'first_name' => $user->first_name]);
                }
            }

            // =========================
            // FLIGHT INTENT DETECTION
            // =========================
            $flightKeywords = [
                'batik', 'citilink', 'garuda', 'lion', 'wings', 'airasia',
                'id ', 'qg', 'ga ', 'jt ', 'iw ',
                'flight', 'boarding', 'gate', 'delay', 'landing', 'takeoff',
                'berangkat', 'kedatangan', 'penerbangan'
            ];

            $isFlightQuestion = false;
            $flightNumber     = null;

            if (preg_match('/\b(id|ga|jt|iw|qg)\s?\d{2,4}\b/i', $message, $matches)) {
                $flightNumber     = strtoupper(str_replace(' ', '', $matches[0]));
                $isFlightQuestion = true;
            }

            if (!$flightNumber && $user->last_flight_number) {
                foreach (['gate', 'delay', 'boarding', 'jam', 'status'] as $kw) {
                    if (str_contains($message, $kw)) {
                        $flightNumber = $user->last_flight_number;
                        break;
                    }
                }
            }

            foreach ($flightKeywords as $keyword) {
                if (str_contains($message, $keyword)) { $isFlightQuestion = true; break; }
            }

            // =========================
            // CEK FAQ
            // =========================
            if (!$isFlightQuestion) {
                foreach (Faq::select('keywords', 'answer')->get() as $faq) {
                    if (!$faq->keywords) continue;
                    foreach (explode(',', strtolower($faq->keywords)) as $kw) {
                        $kw = trim($kw);
                        if ($kw && str_contains($message, $kw)) {
                            ChatMessage::create(['chat_user_id' => $user->id, 'message' => $faq->answer, 'sender' => 'bot']);
                            return response()->json(['reply' => $faq->answer, 'first_name' => $user->first_name]);
                        }
                    }
                }
            }

            // =========================
            // AMBIL DATA PENERBANGAN
            // =========================
            $flights = array_merge(
                $flightService->getFlights('MLG', 'departure')->toArray(),
                $flightService->getFlights('MLG', 'arrival')->toArray()
            );

            if ($flightNumber) {
                $flight = collect($flights)->first(fn($item) =>
                    strtoupper(str_replace(' ', '', $item['flight_number'] ?? '')) === $flightNumber
                );

                if ($flight) {
                    $status  = $flight['status']  ?? 'On Time';
                    $gate    = $flight['gate']    ?? '-';
                    $time    = $flight['time']    ?? '-';
                    $airline = $flight['airline'] ?? '';
                    $emoji   = str_contains(strtolower($status), 'delay') ? '🟠' : '🟢';

                    $user->update(['last_flight_number' => $flightNumber]);
                    $reply = "Penerbangan {$airline} {$flight['flight_number']} saat ini:\n\n{$emoji} {$status}\n🛫 {$time}\n📍 Gate {$gate}";

                    ChatMessage::create(['chat_user_id' => $user->id, 'message' => $reply, 'sender' => 'bot']);
                    return response()->json(['reply' => $reply, 'first_name' => $user->first_name]);
                }
            }

            // =========================
            // GROQ / LLM
            // =========================
            try {
                $reply = $groq->chat($message, $flights);
            } catch (\Exception $e) {
                Log::error('Groq error: ' . $e->getMessage());
                $reply = "Maaf, saya tidak bisa mengambil data sekarang.";
            }

            ChatMessage::create(['chat_user_id' => $user->id, 'message' => $reply, 'sender' => 'bot']);
            return response()->json(['reply' => $reply, 'first_name' => $user->first_name]);

        } catch (\Exception $e) {
            Log::error('ChatbotController@chat: ' . $e->getMessage());
            return response()->json(['message' => 'Server error', 'debug' => $e->getMessage()], 500);
        }
    }

    // =========================
    // LOGOUT
    // =========================
    public function logout(Request $request)
    {
        // ✅ Hapus token dari DB
        $token = $request->cookie('chat_user_token');
        if ($token) {
            ChatUser::where('user_token', $token)
                ->update(['user_token' => null, 'token_login_at' => null]);
        }

        // ✅ Hapus cookie dari browser via response
        return response()->json(['status' => 'success'])
            ->cookie('chat_user_token', '', -1, '/');
    }
}
