<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::table('chat_users', function (Blueprint $table) {
        $table->timestamp('token_login_at')->nullable()->after('user_token');
    });
}

public function down(): void
{
    Schema::table('chat_users', function (Blueprint $table) {
        $table->dropColumn('token_login_at');
    });
}

    
};
