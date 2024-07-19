<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShortLinkServiceHistory extends Model
{
    // Указываем таблицу с которой будем работать
    protected $table = 'short_link_service_histories';

    // Указываем уникальное поле таблицы
    protected $primaryKey = 'id';

    // Есть автоинкремент
    public $incrementing = true;

    // Автоматом писать дату добавления и обновления
    public $timestamps = true;

    // Разрешенные поля для работы
    protected $fillable = [
        'id',
        'ip',
        'short_link_service_id',
        'created_at',
        'updated_at'
    ];

    // Связываем таблицу short_link_service_histories с short_link_service — один к одному
    public function shortLinkService() {
        return $this->hasOne('App\Models\ShortLinkService');
    }
}
