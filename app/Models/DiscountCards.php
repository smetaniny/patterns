<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiscountCards extends Model
{
    //Указываем таблицу с которой будем работать
    protected $table = 'discount_cards';

    //Указываем уникальное поле таблицы
    protected $primaryKey = 'id';

    //Есть автоинкремент
    public $incrementing = true;

    //Автоматом писать дату добавления и обновления
    public $timestamps = true;

    //Разрешенные поля для работы
    protected $fillable = [
        'id',
        'sum_accumulation',
        'sum_bonus',
        'users_id',
        'discount_card_types_id',
        'created_at',
        'updated_at'
    ];

    // Связываем таблицу — один к одному
    public function discountCardTypes()
    {
        return $this->hasOne('App\Models\DiscountCardTypes', 'id', 'discount_card_types_id');
    }

    // Связываем таблицу discount_cards c bonus_operations — один ко многим
    public function bonusOperations() {
        return $this->hasmany('App\Models\BonusOperations', 'discount_cards_id', 'id');
    }

    // Связываем таблицу discount_cards c bonus_operation_futures — один ко многим
    public function bonusOperationFutures() {
        return $this->hasmany('App\Models\BonusOperationFutures', 'discount_cards_id', 'id');
    }

    // Связываем таблицу discount_cards c discount_card_questionnaires — один ко многим
    public function discountCardQuestionares() {
        return $this->hasmany('App\Models\DiscountCardQuestionnaires', 'discount_cards_id', 'id');
    }
}
