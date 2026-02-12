<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ChatUser extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'mobile',
        'category',
        'user_token',
    ];

    protected static function booted()
    {
        static::creating(function ($user) {
            $user->user_token = (string) Str::uuid();
        });
    }
}
