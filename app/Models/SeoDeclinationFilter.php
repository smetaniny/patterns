<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class SeoDeclinationFilter extends Model
{
    //Указываем таблицу с которой будем работать
    protected $table = 'seo_declination_filter';

    //Указываем уникальное поле таблицы
    protected $primaryKey = 'id';

    //Есть автоинкремент
    public $incrementing = true;

    //Автоматом писать дату добавления и обновления
    public $timestamps = true;

    //Разрешенные поля для работы
    protected $fillable = [
        'id',
        'filter_item',
        'filter_value',
        'filter_valueAlias',
        'catalog',
        'detailed',
        'parent'
    ];
}
