<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Модель для работы с таблицей условий акций
 *
 * Class StockCondition
 * @package App
 */
class StockCondition extends Model
{
    //Указываем таблицу с которой будем работать
    protected $table = 'stocks_conditions';

    //Указываем уникальное поле таблицы
    protected $primaryKey = 'id';

    //Есть автоинкремент
    public $incrementing = true;

    //Автоматом писать дату добавления и обновления
    public $timestamps = true;

    //Разрешенные поля для работы
    protected $fillable = [
        'id',
        'condition_id',
        'condition_name',
        'date_start',
        'date_end',
        'discount',
        'card_discount_birthday',
        'card_discount_birthday_before',
        'card_discount_birthday_after',
        'action_group_id',
        'card_discount_group_id',
        'payment_group_id',
        'stocks_id',
        'created_at',
        'updated_at'

    ];

    //Связываем таблицу stocks_conditions с stocks — один к одному
    public function stock() {
        return $this->hasOne('App\Stock');
    }

    //Связываем таблицу stocks_conditions с stocks_tovar_conditions — один ко многим
    public function stockTovarCondition() {
        return $this->hasmany('App\Models\StocksTovarConditions', 'stocks_conditions_id', 'id');
    }

    //Связываем таблицу stocks_conditions с stocks_tovar_results — один ко многим
    public function stockTovarResults() {
        return $this->hasmany('App\Models\StocksTovarResults', 'stocks_conditions_id', 'id');
    }
}
