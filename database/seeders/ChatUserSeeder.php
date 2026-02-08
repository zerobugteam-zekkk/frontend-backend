<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ChatUser;
use Illuminate\Support\Str;

class ChatUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ChatUser::create([
            'first_name' => 'Faray',
            'last_name'  => 'Atmaja',
            'email'      => 'faray@example.com',
            'mobile'     => '08123456789',
            'category'   => 'INFORMASI',
            'user_token' => (string) Str::uuid(),
        ]);
        //
    }
}
