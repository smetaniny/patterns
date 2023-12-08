<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsCategories extends Model
{
    use HasFactory;

    // Указываем таблицу с которой будем работать
    protected $table = 'news_categories';

    // Указываем уникальное поле таблицы
    protected $primaryKey = 'id';

    // Есть авто инкремент
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
    public function news() {
        return $this->hasmany('App\Models\News', 'news_id', 'id');
    }
}
