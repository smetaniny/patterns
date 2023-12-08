<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    //Указываем таблицу с которой будем работать
    protected $table = 'faq';

    //Указываем уникальное поле таблицы
    protected $primaryKey = 'id';

    //Есть автоинкремент
    public $incrementing = true;

    //Автоматом писать дату добавления и обновления
    public $timestamps = true;

    //Разрешенные поля для работы
    protected $fillable = [
        'id',
        'subjectName',
        'question',
        'answer',
        'status_id',
        'result_answer',
        'checkedPersonal',
        'users_id',
        'created_at',
        'updated_at'
    ];

    //Связываем таблицу faq с user — один к одному
    public function user() {
        return $this->hasOne('App\User');
    }

    //Связываем таблицу faq c faq_messages — один ко многим
    public function faqMessages() {
        return $this->hasmany('App\Models\FaqMessages', 'faq_id', 'id');
    }
}
