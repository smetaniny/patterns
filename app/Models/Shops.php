<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shops extends Model
{
    // Указываем таблицу с которой будем работать
    protected $table = 'shops';

    // Указываем уникальное поле таблицы
    protected $primaryKey = 'id';

    // Есть автоинкремент
    public $incrementing = true;

    // Автоматом писать дату добавления и обновления
    public $timestamps = true;

    // Разрешенные поля для работы
    protected $fillable = [
        'id',
        'guid',
        'type',
        'phone',
        'view',
        'city',
        'city_code',
        'address',
        'latitude',
        'longitude',
        'operationMode',
        'status',
        'delivery_days',
        'delivery_date',
        'delivery_sum',
        'delivery_days_express',
        'delivery_date_express',
        'delivery_sum_express',
        'updated_at',
        'created_at',
    ];
}
