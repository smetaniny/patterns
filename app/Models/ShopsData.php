<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopsData extends Model
{
    // Указываем таблицу с которой будем работать
    protected $table = 'shops_data';

    // Указываем уникальное поле таблицы
    protected $primaryKey = 'id';

    // Есть автоинкремент
    public $incrementing = true;

    // Автоматом писать дату добавления и обновления
    public $timestamps = true;

    // Разрешенные поля для работы
    protected $fillable = [
        'id',
        'city',
        'tip',
        'name',
        'address',
        'targetx',
        'targety',
        'metro',
        'phone',
        'operating_mode',
        'created_at',
        'updated_at',
        'joint_sale'
    ];
}
