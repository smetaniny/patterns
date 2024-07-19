<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BonusOperationNames extends Model
{
    //Указываем таблицу с которой будем работать
    protected $table = 'bonus_operation_names';

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
        'created_at',
        'updated_at'
    ];
}
