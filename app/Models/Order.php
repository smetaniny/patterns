<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1, $id)
 */
class Order extends Model
{
    // Указываем таблицу с которой будем работать
    protected $table = 'orders';

    // Указываем уникальное поле таблицы
    protected $primaryKey = 'id';

    // Есть автоинкремент
    public $incrementing = true;

    // Автоматом писать дату добавления и обновления
    public $timestamps = true;

    // Запрещенные поля для работы
    protected $guarded = [];

    // Связываем таблицу orders c orders_products — один ко многим
    public function ordersProducts() {
        return $this->hasmany('App\Models\OrdersProducts', 'orders_id', 'id');
    }

    // Связываем таблицу orders c orders_statuses — один ко многим
    public function ordersStatuses() {
        return $this->hasmany('App\Models\OrdersStatuses', 'orders_id', 'id');
    }

    // Связываем таблицу orders с users — один к одному
    public function user() {
        return $this->hasOne('App\Models\User');
    }

    // Отношение один к одному к заявке на возврат
    public function returnOrder()
    {
        return $this->hasMany(ReturnOrders::class, 'order_id');
    }
}
