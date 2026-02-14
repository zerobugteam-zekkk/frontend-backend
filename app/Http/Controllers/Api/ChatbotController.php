<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\GroqService;
use App\Services\FlightService;
use App\Models\ChatUser;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;

class ChatbotController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string',
            'last_name'  => 'required|string',

            'email' => [
                'required',
                'email',
                'ends_with:@gmail.com'
            ],

            'mobile'   => 'required|string',
            'category' => 'required|string',
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
            'message' => 'Registrasi berhasil, silakan mulai chat'
        ])->cookie(
            'chat_user_token',
            $user->user_token,
            60 * 24 * 30,   // 30 hari
            '/',            // path WAJIB sama saat logout
            null,
            false,          // localhost = false, production = true
            true,           // httpOnly (penting)
            false,
            'Lax'
        );
    }

    public function chat(
        Request $request,
        GroqService $groq,
        FlightService $flightService
    ) {
        $token = $request->cookie('chat_user_token');

        if (!$token) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = ChatUser::where('user_token', $token)->first();

        if (!$user || !$user->user_token) {
            return response()->json([
                'message' => 'Invalid session'
            ], 401);
        }

        $data = $request->validate([
            'message' => 'required|string'
        ]);

        $message = $data['message'];

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

        return response()->json([
            'reply' => $reply,
            'type'  => $type,
            'first_name' => $user->first_name
        ]);
    }

    public function logout(Request $request)
    {
        $token = $request->cookie('chat_user_token');

        if ($token) {
            ChatUser::where('user_token', $token)
                ->update(['user_token' => null]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Logout berhasil'
        ])->withCookie(
            Cookie::forget('chat_user_token')
        );
    }
}
