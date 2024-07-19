<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Context extends Model
{
    //Указываем таблицу с которой будем работать
    protected $table = 'context';

    //Указываем уникальное поле таблицы
    protected $primaryKey = 'id';

    //Есть автоинкремент
    public $incrementing = true;

    //Автоматом писать дату добавления и обновления
    public $timestamps = true;

    //Разрешенные поля для работы
    protected $fillable = [
        'id',
        'utm_source',
        'utm_medium',
        'utm_campaign',
        'utm_term',
        'utm_content',
        'context_orders_id',
        'context_user_id',
        'created_at',
        'updated_at'
    ];

    //Связываем таблицу context — один ко многим
    public function contextOrdersProduct()
    {
        return $this->hasmany('App\Models\OrdersProducts', 'id', 'context_orders_id');
    }

    //Связываем таблицу context — один ко многим
    public function contextUser()
    {
        return $this->hasmany('App\Models\User', 'id', 'context_user_id');
    }
}
