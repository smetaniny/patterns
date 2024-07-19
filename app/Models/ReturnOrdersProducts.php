<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Миграция для таблицы "товары заявки на возврат"
 */
class ReturnOrdersProducts extends Model
{
    use HasFactory;

    //Таблица с которой будем работать
    protected $table = 'return_orders_products';

    //Уникальное поле таблицы
    protected $primaryKey = 'id';

    //Есть автоинкремент
    public $incrementing = true;

    //Автоматом писать дату добавления и обновления
    public $timestamps = true;

    //Разрешенные поля для работы
    protected $fillable = [
        'id',
        'size',
        'insert',
        'quantity',
        'ves',
        'sum',
        'discount',
        'discount_sum',
        'total',
        'cancel',
        'bonus_add',
        'bonus_subtract',
        'return_orders_id',
        'product_id',
        'return_order_id',
        'created_at',
        'updated_at',
    ];

    // Отношение один к одному к модели ReturnOrders
    public function returnOrder() {
        return $this->belongsTo(ReturnOrders::class, 'return_order_id', 'id');
    }

    // Определяем связь один к одному с моделью Product
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id', 'id');
    }
}
