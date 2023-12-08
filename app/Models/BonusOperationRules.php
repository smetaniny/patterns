<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BonusOperationRules extends Model
{
    //Указываем таблицу с которой будем работать
    protected $table = 'bonus_operation_rules';

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
        'name',
        'action_group_id',
        'sum_percent',
        'is_percent',
        'discount_card_types_id',
        'bonus_operation_types_id',
        'created_at',
        'updated_at'
    ];

    // Связываем таблицу — один к одному
    public function discountCardTypes()
    {
        return $this->hasOne('App\Models\DiscountCardTypes');
    }

    // Связываем таблицу — один к одному
    public function bonusOperationTypes()
    {
        return $this->hasOne('App\Models\BonusOperationTypes');
    }
}
