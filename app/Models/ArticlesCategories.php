<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticlesCategories extends Model
{
    // Указываем таблицу с которой будем работать
    protected $table = 'articles_categories';

    // Указываем уникальное поле таблицы
    protected $primaryKey = 'id';

    // Есть автоинкремент
    public $incrementing = true;

    // Автоматом писать дату добавления и обновления
    public $timestamps = true;

    // Разрешенные поля для работы
    protected $fillable = [
        'id',
        'category',
        'created_at',
        'updated_at'
    ];

    // Связываем таблицу один ко многим
    public function blogAarticles() {
        return $this->hasmany('App\Models\Articles', 'articles_id', 'id');
    }
}
