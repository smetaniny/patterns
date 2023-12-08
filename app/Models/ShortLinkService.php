<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShortLinkService extends Model
{
    // Указываем таблицу с которой будем работать
    protected $table = 'short_link_service';

    // Указываем уникальное поле таблицы
    protected $primaryKey = 'id';

    // Есть автоинкремент
    public $incrementing = true;

    // Автоматом писать дату добавления и обновления
    public $timestamps = true;

    // Разрешенные поля для работы
    protected $fillable = [
        'id',
        'link',
        'shortLink',
        'description',
        'created_at',
        'updated_at'
    ];

    // Связываем таблицу short_link_service c short_link_service_histories — один ко многим
    public function shortLinkServiceHistory() {
        return $this->hasmany('App\Models\ShortLinkServiceHistory', 'short_link_service_id', 'id');
    }
}
