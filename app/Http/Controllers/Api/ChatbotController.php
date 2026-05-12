<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\GroqService;
use App\Services\FlightService;
use App\Models\ChatUser;
use App\Models\ChatMessage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;
use App\Models\Faq;

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
            array_merge($data, [
                'user_token' => (string) Str::uuid()
            ])
        );

        return response()->json([
            'status' => 'success',
            'first_name' => $user->first_name,
        ])->cookie(
            'chat_user_token',
            $user->user_token,
            60 * 24 * 30,
            '/',
            null,
            false,
            true,
            false,
            'Lax'
        );
    }

    // =========================
    // CHAT
    // =========================
    public function chat(
        Request $request,
        GroqService $groq,
        FlightService $flightService
    ) {
        $token = $request->cookie('chat_user_token');

        if (!$token) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = ChatUser::where('user_token', $token)->first();

        if (!$user) {
            return response()->json(['message' => 'Invalid session'], 401);
        }

        $data = $request->validate([
            'message' => 'required|string'
        ]);

        // $message = $data['message'];
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
            'message' => $message,
            'sender'  => 'user'
        ]);

        // =========================
        // GREETING HUMAN
        // =========================

        $greetings = [
            'halo',
            'hai',
            'hi',
            'pagi',
            'siang',
            'malam',
            'assalamualaikum',
            'permisi'
        ];

        $thanks = [
            'makasih',
            'terima kasih',
            'thanks',
            'thank you'
        ];
        // Greeting detection
        foreach ($greetings as $greeting) {

            if (str_contains($message, $greeting)) {

                $responses = [
                    "Halo {$user->first_name} 👋\nAda yang bisa saya bantu terkait penerbangan atau fasilitas bandara?",

                    "Hai {$user->first_name} 😊\nSilakan tanyakan informasi penerbangan atau fasilitas bandara ya.",

                    "Selamat datang 👋\nAda informasi bandara yang ingin Anda tanyakan?"
                ];

                $reply = collect($responses)->random();

                ChatMessage::create([
                    'chat_user_id' => $user->id,
                    'message' => $reply,
                    'sender' => 'bot'
                ]);

                return response()->json([
                    'reply' => $reply,
                    'first_name' => $user->first_name
                ]);
            }
        }
        // Thanks detection
        foreach ($thanks as $thank) {

            if (str_contains($message, $thank)) {

                $responses = [
                    "Sama-sama 😊\nSemoga perjalanan Anda menyenangkan ✈️",

                    "Dengan senang hati 👋\nSemoga penerbangan Anda lancar.",

                    "Baik 😊\nTerima kasih sudah menggunakan layanan chatbot bandara."
                ];

                $reply = collect($responses)->random();

                ChatMessage::create([
                    'chat_user_id' => $user->id,
                    'message' => $reply,
                    'sender' => 'bot'
                ]);

                return response()->json([
                    'reply' => $reply,
                    'first_name' => $user->first_name
                ]);
            }
        }
        // =========================
        // FLIGHT INTENT DETECTION
        // =========================

        $flightKeywords = [
            'batik',
            'citilink',
            'garuda',
            'lion',
            'wings',
            'airasia',
            'id ',
            'qg',
            'ga ',
            'jt ',
            'iw ',
            'flight',
            'boarding',
            'gate',
            'delay',
            'landing',
            'takeoff',
            'berangkat',
            'kedatangan',
            'penerbangan'
        ];

        $isFlightQuestion = false;

        $flightNumber = null;

        if (
            preg_match('/\b(id|ga|jt|iw|qg)\s?\d{2,4}\b/i', $message, $matches)
        ) {

            $flightNumber = strtoupper(
                str_replace(' ', '', $matches[0])
            );

            $isFlightQuestion = true;
        }

        $contextKeywords = [
            'gate',
            'delay',
            'boarding',
            'jam',
            'status'
        ];

        if (!$flightNumber && $user->last_flight_number) {

            foreach ($contextKeywords as $keyword) {

                if (str_contains($message, $keyword)) {

                    $flightNumber = $user->last_flight_number;

                    break;
                }
            }
        }

        foreach ($flightKeywords as $keyword) {

            if (str_contains($message, $keyword)) {
                $isFlightQuestion = true;
                break;
            }
        }
        /*
        |--------------------------------------------------------------------------
        | Cek FAQ
        |--------------------------------------------------------------------------
        */

        if (!$isFlightQuestion) {

            $faqs = Faq::select('keywords', 'answer')->get();

            foreach ($faqs as $faq) {

                if (!$faq->keywords) {
                    continue;
                }

                $keywords = explode(',', strtolower($faq->keywords));

                foreach ($keywords as $keyword) {

                    $keyword = trim($keyword);

                    if ($keyword && str_contains($message, $keyword)) {

                        $reply = $faq->answer;

                        ChatMessage::create([
                            'chat_user_id' => $user->id,
                            'message' => $reply,
                            'sender'  => 'bot'
                        ]);

                        return response()->json([
                            'reply' => $reply,
                            'first_name' => $user->first_name
                        ]);
                    }
                }
            }
        }

        // =========================
        // DETEKSI TYPE
        // =========================
        $type = (
            str_contains($message, 'kedatangan') ||
            str_contains($message, 'arrival') ||
            str_contains($message, 'datang')
        )
            ? 'arrival'
            : 'departure';
        // keberangkan, kedatangan
        $departures = $flightService
            ->getFlights('MLG', 'departure')
            ->toArray();

        $arrivals = $flightService
            ->getFlights('MLG', 'arrival')
            ->toArray();

        $flights = array_merge($departures, $arrivals);

        if ($flightNumber) {

            $flight = collect($flights)->first(function ($item) use ($flightNumber) {

                $dbFlight = strtoupper(
                    str_replace(' ', '', $item['flight_number'] ?? '')
                );

                return $dbFlight === $flightNumber;
            });
            // jika pertanyaan mengandung nomor penerbangan yang valid, tampilkan info penerbangan langsung tanpa lewat LLM
            if ($flight) {
                $status = $flight['status'] ?? 'On Time';
                $gate   = $flight['gate'] ?? '-';
                $time   = $flight['time'] ?? '-';
                $airline = $flight['airline'] ?? '';

                $flightType = strtolower($flight['type'] ?? 'departure');

                $typeLabel = $flightType === 'arrival'
                    ? 'Kedatangan'
                    : 'Keberangkatan';

                $emoji = str_contains(strtolower($status), 'delay')
                    ? '🟠'
                    : '🟢';

                // penampungan nomor penerbangan terakhir untuk fitur follow-up
                $user->update([
                    'last_flight_number' => $flightNumber

                ]);

                $status = $flight['status'] ?? 'On Time';
                $gate   = $flight['gate'] ?? '-';
                $time   = $flight['time'] ?? '-';
                $airline = $flight['airline'] ?? '';

                $emoji = str_contains(strtolower($status), 'delay')
                    ? '🟠'
                    : '🟢';

                $reply = "
Penerbangan {$airline} {$flight['flight_number']} saat ini:

{$emoji} {$status}
🛫 {$time}
📍 Gate {$gate}
";

                ChatMessage::create([
                    'chat_user_id' => $user->id,
                    'message' => trim($reply),
                    'sender'  => 'bot'
                ]);

                return response()->json([
                    'reply' => trim($reply),
                    'first_name' => $user->first_name
                ]);
            }
        }

        try {
            $reply = $groq->chat($message, $flights);
            // nyampe sini
        } catch (\Exception $e) {

            $reply = "Maaf, saya tidak bisa mengambil data sekarang.";
        }

        // =========================
        // SIMPAN BALASAN BOT
        // =========================
        ChatMessage::create([
            'chat_user_id' => $user->id,
            'message' => $reply,
            'sender'  => 'bot'
        ]);

        return response()->json([
            'reply' => $reply,
            'first_name' => $user->first_name
        ]);
    }

    // =========================
    // LOGOUT
    // =========================
    public function logout(Request $request)
    {
        $token = $request->cookie('chat_user_token');

        if ($token) {
            ChatUser::where('user_token', $token)
                ->update(['user_token' => null]);
        }

        return response()->json([
            'status' => 'success'
        ])->withCookie(
            Cookie::forget('chat_user_token')
        );
    }
}
