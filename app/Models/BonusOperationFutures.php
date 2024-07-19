<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BonusOperationFutures extends Model
{
    //Указываем таблицу с которой будем работать
    protected $table = 'bonus_operation_futures';

    //Указываем уникальное поле таблицы
    protected $primaryKey = 'id';

    //Есть автоинкремент
    public $incrementing = true;

    //Автоматом писать дату добавления и обновления
    public $timestamps = true;

    //Разрешенные поля для работы
    protected $fillable = [
        'id',
        'vid_operation',
        'sum_bonus',
        'status',
        'order_id',
        'discount_cards_id',
        'bonus_operation_types_id',
        'created_at',
        'updated_at'
    ];

    // Связываем таблицу — один к одному
    public function bonusOperationTypes()
    {
        return $this->hasOne('App\Models\BonusOperationTypes');
    }

    // Связываем таблицу — один к одному
    public function discountCards()
    {
        return $this->hasOne('App\Models\DiscountCards');
    }
}
