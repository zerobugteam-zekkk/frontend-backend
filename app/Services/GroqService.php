<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GroqService
{
    public function chat(string $message, array $context = []): string
    {
        $systemPrompt = <<<PROMPT
Kamu adalah asisten chatbot jadwal penerbangan Bandara Abdurachman Saleh (MLG).

Gunakan DATA berikut sebagai SATU-SATUNYA sumber kebenaran.
JANGAN mengarang data penerbangan.

DATA PENERBANGAN:
{$this->formatContext($context)}

Jawab dengan bahasa Indonesia yang jelas dan singkat.
PROMPT;

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('GROQ_API_KEY'),
            'Content-Type'  => 'application/json',
        ])->post('https://api.groq.com/openai/v1/chat/completions', [
            'model' => 'llama-3.1-8b-instant',
            'messages' => [
                ['role' => 'system', 'content' => $systemPrompt],
                ['role' => 'user', 'content' => $message],
            ],
            'temperature' => 0.3, // 🔥 diturunkan agar tidak ngarang
        ]);

        if (!$response->successful()) {
            throw new \Exception($response->body());
        }

        return $response->json('choices.0.message.content');
    }

    protected function formatContext(array $flights): string
    {
        if (empty($flights)) {
            return "Tidak ada data penerbangan.";
        }

        return collect($flights)->map(function ($f) {
            return "{$f['time']} | {$f['airline']} | {$f['flight']} | {$f['city']} | {$f['status']}";
        })->implode("\n");
    }
}
