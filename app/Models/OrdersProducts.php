<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdersProducts extends Model
{
    //Указываем таблицу с которой будем работать
    protected $table = 'orders_products';

    //Автоматом писать дату добавления и обновления
    public $timestamps = true;

    //Разрешенные поля для работы
    protected $fillable = [
        'product_id',
        'size',
        'insert',
        'quantity',
        'ves',
        'sum',
        'discount',
        'discount_sum',
        'total',
        'action_id',
        'condition_id',
        'orders_id',
        'cancel',
        'bonus_add',
        'bonus_subtract',
        'created_at',
        'updated_at'
    ];

//    protected $primaryKey = 'orders_id';

    //Связываем таблицу orders_products с orders — один к одному
    public function order() {
        return $this->hasOne('App\Models\Order');
    }

    //Связываем таблицу orders_products с products — один к одному
    public function product() {
        return $this->hasOne('App\Models\Products', 'id', 'product_id');
    }

    //Связываем таблицу — один к одному
    public function context() {
        return $this->hasOne('App\Models\Context');
    }
}
