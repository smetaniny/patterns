<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Модель с работай со списком желаний
 *
 * Class UsersWishList
 * @package App
 * @method static Create(array $dataArr)
 * @method static where(string $string, string $string1, mixed $id)
 */
class UsersWishList extends Model
{
    //Указываем таблицу с которой будем работать
    protected $table = 'users_wish_list';

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
        'users_id',
        'created_at',
        'updated_at'
    ];

    //Связываем таблицу users_wish_list с user — один к одному
    public function user(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('App\Models\User');
    }
}
