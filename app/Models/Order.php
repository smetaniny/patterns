<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1, $id)
 */
class Order extends Model
{
    //Указываем таблицу с которой будем работать
    protected $table = 'orders';
    //Указываем уникальное поле таблицы
    protected $primaryKey = 'id';
    //Есть автоинкремент
    public $incrementing = true;
    //Автоматом писать дату добавления и обновления
    public $timestamps = true;
    //Разрешенные поля для работы
    protected $fillable = [
        'id',
        'address',
        'payment_method',
        'source_from',
        'promo_id',
        'promo_sum',
        'promo_type',
        'card_id',
        'quantity',
        'ves',
        'total',
        'certificate_sum',
        'shipping_method',
        'shipping_sum',
        'shipping_track_number',
        'comment',
        'exchange_statuses',
        'payment_id_sberbank',
        'send_status',
        'users_id',
        'isFitting',
        'clientId',
        'ignoreStatistics',
        'onlineDiscount',
        'bank_form_url',
        'delivery_service',
        'delivery_date',
        'delivery_type',
        'created_at',
        'updated_at',
        'managers_comment'
    ];

    //Связываем таблицу orders c orders_products — один ко многим
    public function ordersProducts() {
        return $this->hasmany('App\Models\OrdersProducts', 'orders_id', 'id');
    }

    //Связываем таблицу orders c orders_statuses — один ко многим
    public function ordersStatuses() {
        return $this->hasmany('App\Models\OrdersStatuses', 'orders_id', 'id');
    }

    //Связываем таблицу orders с users — один к одному
    public function user() {
        return $this->hasOne('App\Models\User');
    }

    // Отношение один к одному к заявке на возврат
    public function returnOrder()
    {
        return $this->hasMany(ReturnOrders::class, 'order_id');
    }
}
