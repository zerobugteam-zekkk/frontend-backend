<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GroqService
{
    public function chat(string $message, array $context = [], string $locale = 'id'): string
    {
        $languageInstruction = $locale === 'en'
            ? "You MUST reply in English. The user is writing in English."
            : "Kamu HARUS membalas dalam Bahasa Indonesia. Pengguna menulis dalam Bahasa Indonesia.";

        $systemPrompt = $locale === 'en'
            ? <<<PROMPT
You are a flight schedule assistant chatbot for Abdurachman Saleh Airport (MLG), Malang, Indonesia.
Use the DATA below as the ONLY source of truth. DO NOT make up flight data.

FLIGHT DATA:
{$this->formatContext($context)}

{$languageInstruction}
Reply clearly and concisely in English.
PROMPT
            : <<<PROMPT
Kamu adalah asisten chatbot jadwal penerbangan Bandara Abdurachman Saleh (MLG).
Gunakan DATA berikut sebagai SATU-SATUNYA sumber kebenaran.
JANGAN mengarang data penerbangan.

DATA PENERBANGAN:
{$this->formatContext($context)}

{$languageInstruction}
Jawab dengan bahasa Indonesia yang jelas dan singkat.
PROMPT;

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('GROQ_API_KEY'),
            'Content-Type'  => 'application/json',
        ])->post('https://api.groq.com/openai/v1/chat/completions', [
            'model' => 'llama-3.1-8b-instant',
            'messages' => [
                ['role' => 'system', 'content' => $systemPrompt],
                ['role' => 'user',   'content' => $message],
            ],
            'temperature' => 0.3,
        ]);

        if (!$response->successful()) {
            throw new \Exception($response->body());
        }

        return $response->json('choices.0.message.content');
    }

    protected function formatContext(array $flights): string
    {
        if (empty($flights)) {
            return "No flight data available.";
        }

        return collect($flights)->map(function ($f) {
            return "{$f['time']} | {$f['airline']} | {$f['flight']} | {$f['city']} | {$f['status']}";
        })->implode("\n");
    }
}
