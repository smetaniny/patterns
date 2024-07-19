<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PvzData extends Model
{
    // Указываем таблицу с которой будем работать
    protected $table = 'pvz_data';

    // Указываем уникальное поле таблицы
    protected $primaryKey = 'id';

    // Есть авто инкремент
    public $incrementing = true;

    // Автоматом писать дату добавления и обновления
    public $timestamps = true;

    // Разрешенные поля для работы
    protected $fillable = [
        'id',
        'city',
        'region',
        'type',
        'view',
        'code',
        'latitude',
        'longitude',
        'address',
        'howToGet',
        'phone',
        'operationMode',
        'status',
        'value',
        'label',
        'have_cashless',
        'have_cash',
        'city_code',
        'delivery_days',
        'delivery_date',
        'delivery_sum',
        'created_at',
        'updated_at',
        'delivery_days_express',
        'delivery_date_express',
        'delivery_sum_express',
    ];
}
