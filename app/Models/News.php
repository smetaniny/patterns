<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    // Указываем таблицу с которой будем работать
    protected $table = 'news';

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
        'imgPreview',
        'body',
        'bodyHtml',
        'created_at',
        'updated_at',
        'news_id',
        'status',
    ];

    // Связываем таблицу один к одному
    public function newsCategories() {
        return $this->hasOne('App\Models\NewsCategories', 'id', 'news_id');
    }
}
