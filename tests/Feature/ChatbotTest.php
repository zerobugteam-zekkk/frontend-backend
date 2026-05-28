<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Faq;
use App\Models\ChatUser;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Str;

class ChatbotTest extends TestCase
{
    use DatabaseTransactions;

    // ─────────────────────────────────────────────────────────────────────────
    // 1. Konfigurasi Groq harus terbaca melalui config(), bukan env()
    //    (env() mengembalikan null saat config di-cache di production)
    // ─────────────────────────────────────────────────────────────────────────
    public function test_groq_config_is_correct(): void
    {
        $this->assertNotEmpty(config('services.groq.key'));
        $this->assertStringStartsWith('gsk_', config('services.groq.key'));
    }

    // ─────────────────────────────────────────────────────────────────────────
    // 2. Kolom FAQ di database harus bernama 'keyword' (bukan 'keywords')
    //    dan dapat di-insert serta di-query
    // ─────────────────────────────────────────────────────────────────────────
    public function test_faq_table_uses_keyword_column(): void
    {
        $faq = Faq::create([
            'question' => 'Jam berapa bandara buka?',
            'answer'   => 'Bandara beroperasi 24 jam.',
            'keyword'  => 'jam,buka,operasional',
        ]);

        $this->assertDatabaseHas('faqs', [
            'id'      => $faq->id,
            'keyword' => 'jam,buka,operasional',
        ]);

        // Pastikan query dengan kolom 'keyword' tidak error
        $found = Faq::select('keyword', 'answer')->where('keyword', 'LIKE', '%jam%')->first();
        $this->assertNotNull($found);
        $this->assertStringContainsString('jam', $found->keyword);
    }

    // ─────────────────────────────────────────────────────────────────────────
    // 3. Register chatbot harus berhasil dan mengembalikan cookie sesi
    // ─────────────────────────────────────────────────────────────────────────
    public function test_chatbot_register_returns_session_cookie(): void
    {
        $response = $this->postJson('/api/chat/register', [
            'first_name' => 'Budi',
            'last_name'  => 'Santoso',
            'email'      => 'budi.test123@gmail.com',
            'mobile'     => '08112345678',
            'category'   => 'Penumpang',
        ]);

        $response->assertStatus(200);
        $response->assertJsonFragment(['status' => 'success']);
        $response->assertCookie('chat_user_token');
    }

    // ─────────────────────────────────────────────────────────────────────────
    // 4. Endpoint /api/chat harus membalas FAQ yang cocok dengan kata kunci
    //    Buat ChatUser langsung di DB lalu kirim cookie raw (API route
    //    tidak menggunakan EncryptCookies middleware)
    // ─────────────────────────────────────────────────────────────────────────
    public function test_chat_endpoint_matches_faq_keyword(): void
    {
        // Buat FAQ dengan kata kunci 'parkir'
        Faq::create([
            'question' => 'Dimana lokasi parkir?',
            'answer'   => 'Area parkir tersedia di lantai P1.',
            'keyword'  => 'parkir,area parkir,kendaraan',
        ]);

        // Buat user chatbot langsung ke DB
        $token = (string) Str::uuid();
        ChatUser::create([
            'first_name' => 'Siti',
            'last_name'  => 'Rahayu',
            'email'      => 'siti.rahayu99@gmail.com',
            'mobile'     => '08199999999',
            'category'   => 'Pengantar',
            'user_token' => $token,
        ]);

        // Kirim permintaan chat — cookies dikirim sebagai raw value
        // API routes tidak memiliki EncryptCookies middleware, jadi
        // $request->cookies->get() akan membaca nilai cookie secara langsung
        $response = $this->call(
            'POST',
            '/api/chat',
            [],
            ['chat_user_token' => $token],   // cookies array (raw, tidak dienkripsi)
            [],
            ['HTTP_CONTENT_TYPE' => 'application/json', 'HTTP_ACCEPT' => 'application/json'],
            json_encode(['message' => 'parkir'])
        );

        $this->assertEquals(200, $response->status(), $response->getContent());
        $this->assertStringContainsString('parkir', strtolower($response->getContent()));
    }
}
