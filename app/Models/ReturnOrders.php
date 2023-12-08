<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Модель для таблицы "возврат товаров"
 */
class ReturnOrders extends Model
{
    use HasFactory;

    //Таблица с которой будем работать
    protected $table = 'return_orders';
    //Уникальное поле таблицы
    protected $primaryKey = 'id';
    //Есть автоинкремент
    public $incrementing = true;
    //Автоматом писать дату добавления и обновления
    public $timestamps = true;
    //Разрешенные поля для работы
    protected $fillable = [
        'id',
        'status',
        'total',
        'quantity',
        'ves',
        'type',
        'address',
        'refund_method',
        'bankAccount_inn',
        'bankAccount_number',
        'bankAccount_bik',
        'bankAccount_correspondent_number',
        'photo',
        'reason_for_return',
        'received_date',
        'managers_comment',
        'order_id',
        'user_id',
        'phone',
        'email',
        'surname',
        'name',
        'patronymic',
        'date_of_birth',
        'passport_series',
        'passport_number',
        'passport_date_of_issue',
        'passport_date_of_division',
        'passport_issued_by_whom',
        'created_at',
        'updated_at',
    ];

    //Отношение один к одному к модели Order(заказы)
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    //Отношение один к одному к модели User(пользователи)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //Отношение один ко многим к модели ReturnOrdersProducts
    public function returnOrderProducts()
    {
        return $this->hasMany(ReturnOrdersProducts::class, 'return_order_id', 'id');
    }

    public function ordersProducts()
    {
        return $this->hasManyThrough(OrdersProducts::class, Order::class, 'id', 'orders_id', 'order_id');
    }


}
