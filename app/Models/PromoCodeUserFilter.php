<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromoCodeUserFilter extends Model
{
    //Указываем таблицу с которой будем работать
    protected $table = 'promo_code_user_filter';

    //Указываем уникальное поле таблицы
    protected $primaryKey = 'id';

    //Есть автоинкремент
    public $incrementing = true;

    //Автоматом писать дату добавления и обновления
    public $timestamps = true;

    //Разрешенные поля для работы
    protected $fillable = [
        'id',
        'user_filter',
        'user_filter_alias',
        'promo_code_id',
        'created_at',
        'updated_at'
    ];

    //Связываем таблицу один к одному
    public function promoCode() {
        return $this->hasOne('App\Models\PromoCode');
    }
}
