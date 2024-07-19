<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PushCampaign extends Model
{
    use HasFactory;

    // Указываем уникальное поле таблицы
    protected $primaryKey = 'id';

    // Есть авто инкремент
    public $incrementing = true;

    // Автоматом писать дату добавления и обновления
    public $timestamps = true;

    // Запрещенные поля для работы
    protected $guarded = [];
}
