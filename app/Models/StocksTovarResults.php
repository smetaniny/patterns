<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Модель для работы с таблицей результата условий акций на чек
 *
 * Class StocksTovarResults
 * @package App
 */
class StocksTovarResults extends Model
{
    //Указываем таблицу с которой будем работать
    protected $table = 'stocks_tovar_results';

    //Указываем уникальное поле таблицы
    protected $primaryKey = 'id';

    //Есть автоинкремент
    public $incrementing = true;

    //Автоматом писать дату добавления и обновления
    public $timestamps = true;

    //Разрешенные поля для работы
    protected $fillable = [
        'id',
        'action_group_id',
        'quantity',
        'stocks_conditions_id',
        'created_at',
        'updated_at'
    ];

    //Связываем таблицу stocks_tovar_results с stocks_conditions — один к одному
    public function stockCondition() {
        return $this->hasOne('App\Models\StockCondition');
    }
}
