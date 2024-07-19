<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuCatalog extends Model
{
    use HasFactory;

    //Указываем таблицу с которой будем работать
    protected $table = 'menu_catalog';

    //Указываем уникальное поле таблицы
    protected $primaryKey = 'id';

    //Есть автоинкремент
    public $incrementing = true;

    //Автоматом писать дату добавления и обновления
    public $timestamps = true;

    //Разрешенные поля для работы
    protected $fillable = [
        'id',
        'type',
        'name',
        'sort',
        'parent_id',
        'url',
        'img',
        'svg',
        'status',
        'created_at',
        'updated_at'
    ];
}
