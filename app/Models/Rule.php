<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    //Указываем таблицу с которой будем работать
    protected $table = 'rule';

    //Указываем уникальное поле таблицы
    protected $primaryKey = 'id';

    //Есть автоинкремент
    public $incrementing = true;

    //Автоматом писать дату добавления и обновления
    public $timestamps = true;

    //Разрешенные поля для работы
    protected $fillable = [
        'id',
        'name',
        'url',
        'pdf',
        'pdf_url',
        'pdf_name',
        'body',
        'bodyHtml',
        'created_at',
        'updated_at'
    ];
}
