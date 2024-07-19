<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static leftJoin(string $string, \Closure $param)
 */
class UsersWaitList extends Model
{
    //Указываем таблицу с которой будем работать
    protected $table = 'users_wait_list';

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
        'size',
        'status_id',
        'users_id',
        'comment',
        'deleted',
        'deleted_date',
        'mail_sent',
        'mail_sent_date',
        'orders_id',
        'created_at',
        'updated_at'
    ];

    //Связываем таблицу users_wait_list с user — один к одному
    public function user()
    {
        return $this->hasOne('App\Models\User');
    }
}
