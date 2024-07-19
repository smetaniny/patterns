<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1, $id)
 */
class UsersReview extends Model
{
    //Указываем таблицу с которой будем работать
    protected $table = 'users_review';

    //Указываем уникальное поле таблицы
    protected $primaryKey = 'id';

    //Есть автоинкремент
    public $incrementing = true;

    //Автоматом писать дату добавления и обновления
    public $timestamps = true;

    //Разрешенные поля для работы
    protected $fillable = [
        'id',
        'product_id',
        'author',
        'text',
        'rating',
        'status',
        'img',
        'users_id',
        'is_bonuses',
        'created_at',
        'updated_at'
    ];

    //Связываем таблицу users_review с user — один к одному
    public function user() {
        return $this->hasOne('App\Models\User');
    }
}
