<?php

namespace App\Models;

use App\Traits\SearchableCatalog;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1, bool $url)
 */
class SeoCatalog extends Model
{
    use SearchableCatalog;

    //Указываем таблицу с которой будем работать
    protected $table = 'seo_catalog';

    //Указываем уникальное поле таблицы
    protected $primaryKey = 'id';

    //Есть автоинкремент
    public $incrementing = true;

    //Автоматом писать дату добавления и обновления
    public $timestamps = true;

    //Разрешенные поля для работы
    protected $fillable = [
        'id',
        'url',
        'title',
        'description',
        'h1',
        'text',
        'show',
        'created_at',
        'updated_at',
        'canonical',
        'robots',
        'isSiteMap'
    ];
}
