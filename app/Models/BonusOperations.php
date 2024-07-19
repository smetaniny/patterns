<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BonusOperations extends Model
{
    //Указываем таблицу с которой будем работать
    protected $table = 'bonus_operations';

    //Указываем уникальное поле таблицы
    protected $primaryKey = 'id';

    //Есть автоинкремент
    public $incrementing = true;

    //Автоматом писать дату добавления и обновления
    public $timestamps = true;

    //Разрешенные поля для работы
    protected $fillable = [
        'operation_name',
        'vid_operation',
        'sum_bonus',
        'date',
        'discount_cards_id',
        'created_at',
        'updated_at'
    ];

    // Связываем таблицу — один к одному
    public function discountCards()
    {
        return $this->hasOne('App\Models\DiscountCards');
    }
}
