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
            'email'      => ['required','email','ends_with:@gmail.com'],
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

        $message = $data['message'];

        // =========================
        // AUTO PING (load history)
        // =========================
        if ($message === 'ping') {

            $history = ChatMessage::where('chat_user_id', $user->id)
                ->where('created_at', '>=', now()->subHours(24))
                ->orderBy('created_at')
                ->get(['message','sender']);

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
        // DETEKSI TYPE
        // =========================
        $type = str_contains(strtolower($message), 'kedatangan')
            ? 'arrival'
            : 'departure';

        $flights = $flightService
            ->getFlights('MLG', $type)
            ->toArray();

        try {
            $reply = $groq->chat($message, $flights);
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
