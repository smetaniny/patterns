<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiscountCardTypes extends Model
{
    //Указываем таблицу с которой будем работать
    protected $table = 'discount_card_types';

    //Указываем уникальное поле таблицы
    protected $primaryKey = 'id';

    //Есть автоинкремент
    public $incrementing = true;

    //Автоматом писать дату добавления и обновления
    public $timestamps = true;

    //Разрешенные поля для работы
    protected $fillable = [
        'id',
        'name',
        'threshold',
        'img',
        'created_at',
        'updated_at'
    ];

    // Связываем таблицу discount_card_types c bonus_operation_rules — один ко многим
    public function bonusOperationRules() {
        return $this->hasmany('App\Models\BonusOperationRules', 'discount_card_types_id', 'id');
    }

    // Связываем таблицу discount_card_types c bonus_operation_rules — один ко многим
    public function discountCards() {
        return $this->hasmany('App\Models\DiscountCards', 'discount_card_types_id', 'id');
    }
}
