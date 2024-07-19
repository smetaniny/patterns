<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqMessages extends Model
{
    //Указываем таблицу с которой будем работать
    protected $table = 'faq_messages';

    //Указываем уникальное поле таблицы
    protected $primaryKey = 'id';

    //Есть автоинкремент
    public $incrementing = true;

    //Автоматом писать дату добавления и обновления
    public $timestamps = true;

    //Разрешенные поля для работы
    protected $fillable = [
        'id',
        'message',
        'faq_id',
        'users_id',
        'created_at',
        'updated_at'
    ];

    //Связываем таблицу faq_messages с user — один к одному
    public function user() {
        return $this->hasOne('App\Models\User');
    }
}
