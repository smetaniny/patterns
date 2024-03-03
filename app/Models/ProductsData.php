<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static rightJoin(string $string, string $string1, string $string2, string $string3)
 * @property mixed|null action_id
 * @property mixed|null condition_id
 * @property mixed|null card_discount
 * @property mixed|null card_price
 * @property mixed|null stocksName
 * @property mixed|null stocksConditionName
 * @property false|mixed notPromoCode
 */
class ProductsData extends Model
{
    //Указываем таблицу с которой будем работать
    protected $table = 'products_data';
    //Указываем уникальное поле таблицы
    protected $primaryKey = 'id';
    //Есть автоинкремент
    public $incrementing = true;
    //Автоматом писать дату добавления и обновления
    public $timestamps = true;

    //Разрешенные поля для работы
    protected $fillable = [
        'id',
        'razmer',
        'ves',
        'price',
        'insert',
        'kol',
        'status',
        'created_at',
        'updated_at'
    ];

    //Связываем таблицу products_data с products — один к одному
    public function product()
    {
        return $this->hasOne('App\Models\Products');
    }

    //Связываем таблицу product_data c product_data_shops — один ко многим
    public function productDataShop()
    {
        return $this->hasmany('App\Models\ProductsDataShops', 'product_data_id', 'id');
    }
}
