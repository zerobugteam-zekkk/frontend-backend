<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\GroqService;
use App\Services\FlightService;
use App\Models\ChatUser;
use Illuminate\Support\Str;

class ChatbotController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string',
            'last_name'  => 'required|string',
            'email'      => 'required|email',
            'mobile'     => 'required|string',
            'category'   => 'required|string',
        ]);

        // Cek dulu apakah user sudah ada email sama
        $user = ChatUser::firstOrCreate(
            ['email' => $data['email']],
            array_merge($data, ['user_token' => (string) Str::uuid()])
        );

        return response()->json([
            'status' => 'success',
            'user_id' => $user->id,
            'user_token' => $user->user_token,
            'first_name' => $user->first_name,
            'message' => 'Registrasi berhasil, silakan mulai chat'
        ]);
    }

    public function chat(
    Request $request,
    GroqService $groq,
    FlightService $flightService
    ) {
        $data = $request->validate([
            'user_token' => 'required|exists:chat_users,user_token',
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
            $reply = "Maaf, saya tidak bisa mengambil data sekarang. Silakan coba lagi sebentar lagi.";
        }

        return response()->json([
            'status' => 'success',
            'reply'  => $reply,
            'type'   => $type
        ]);
    }
}
