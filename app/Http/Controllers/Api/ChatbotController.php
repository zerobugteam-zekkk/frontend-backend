<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\GroqService;
use App\Services\FlightService;
use App\Models\ChatUser;

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

        $user = ChatUser::create($data);

        return response()->json([
            'status' => 'success',
            'user_id' => $user->id,
            'message' => 'Registrasi berhasil, silakan mulai chat'
        ]);
    }

    public function chat(
    Request $request,
    GroqService $groq,
    FlightService $flightService
    ) {
        $data = $request->validate([
            'user_id' => 'required|exists:chat_users,id',
            'message' => 'required|string'
        ]);

        $message = $data['message'];

        $type = str_contains(strtolower($message), 'kedatangan')
            ? 'arrival'
            : 'departure';

        $flights = $flightService
            ->getFlights('MLG', $type)
            ->toArray();

        $reply = $groq->chat($message, $flights);

        return response()->json([
            'status' => 'success',
            'reply'  => $reply,
            'type'   => $type
        ]);
    }
}
