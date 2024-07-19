<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdersStatuses extends Model
{
    //Указываем таблицу с которой будем работать
    protected $table = 'orders_statuses';

    //Автоматом писать дату добавления и обновления
    public $timestamps = true;

    //Разрешенные поля для работы
    protected $fillable = [
        'status_id',
        'date',
        'orders_id',
        'created_at',
        'updated_at'
    ];

    //Связываем таблицу orders_statuses с orders — один к одному
    public function order() {
        return $this->hasOne('App\Models\Order');
    }
}
