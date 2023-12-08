<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1, $id)
 */
class Basket extends Model
{
    //Указываем таблицу с которой будем работать
    protected $table = 'basket';

    //Указываем уникальное поле таблицы
    protected $primaryKey = 'id';

    //Есть автоинкремент
    public $incrementing = true;

    //Автоматом писать дату добавления и обновления
    public $timestamps = true;

    //Разрешенные поля для работы
    protected $fillable = [
        'id',
        'user_id',
        'product_id',
        'product_data_id',
        'count',
        'created_at',
        'updated_at'
    ];

    //Связываем таблицу  — один к одному
    public function user() {
        return $this->hasOne('App\Models\User');
    }
}
