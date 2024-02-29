<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminPage extends Model
{
    use HasFactory;

    /**
     * Запрещенные поля для работы
     *
     * @var array
     */
    protected $guarded = [];
}
