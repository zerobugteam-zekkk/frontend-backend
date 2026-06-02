<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ChatUser extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'mobile',
        'category',
        'user_token',
        'token_login_at', // ✅ tambahkan ini
        'last_flight_number',
    ];

    // ✅ Hapus booted() — token sekarang diset manual di controller
}
