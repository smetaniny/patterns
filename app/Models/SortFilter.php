<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SortFilter extends Model
{
    //Указываем таблицу с которой будем работать
    protected $table = 'sort_filter';

    //Указываем уникальное поле таблицы
    protected $primaryKey = 'id';

    //Есть автоинкремент
    public $incrementing = true;

    //Автоматом писать дату добавления и обновления
    public $timestamps = true;

    //Разрешенные поля для работы
    protected $fillable = [
        'id',
        'title',
        'name',
        'alias',
        'parent',
        'sort',
        'created_at',
        'updated_at'
    ];
}
