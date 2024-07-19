<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    // Указываем таблицу с которой будем работать
    protected $table = 'password_resets';

    protected $fillable = [
        'email', 'phone', 'token', 'created_at'
    ];

    public $timestamps = false;
}
