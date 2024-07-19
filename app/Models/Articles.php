<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static count()
 * @method static leftJoin(string $string, string $string1, string $string2, string $string3)
 */
class Articles extends Model
{
    // Указываем таблицу с которой будем работать
    protected $table = 'articles';

    // Указываем уникальное поле таблицы
    protected $primaryKey = 'id';

    // Есть автоинкремент
    public $incrementing = true;

    // Автоматом писать дату добавления и обновления
    public $timestamps = true;

    // Разрешенные поля для работы
    protected $fillable = [
        'id',
        'title',
        'url',
        'description',
        'h1',
        'body',
        'bodyHtml',
        'imgPreview',
        'articles_id',
        'status',
        'created_at',
        'updated_at'
    ];

    // Связываем таблицу один к одному
    public function blogArticlesCategories() {
        return $this->hasOne('App\Models\ArticlesCategories', 'id', 'articles_id');
    }
}
