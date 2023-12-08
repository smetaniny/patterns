<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromoCodeCollectionFilter extends Model
{
    //Указываем таблицу с которой будем работать
    protected $table = 'promo_code_collection_filter';

    //Указываем уникальное поле таблицы
    protected $primaryKey = 'id';

    //Есть автоинкремент
    public $incrementing = true;

    //Автоматом писать дату добавления и обновления
    public $timestamps = true;

    //Разрешенные поля для работы
    protected $fillable = [
        'id',
        'collection_filter',
        'collection_filter_alias',
        'promo_code_id',
        'created_at',
        'updated_at'
    ];

    //Связываем таблицу один к одному
    public function promoCode() {
        return $this->hasOne('App\Models\PromoCode');
    }
}
