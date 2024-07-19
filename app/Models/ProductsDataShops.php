<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductsDataShops extends Model
{
    // Указываем таблицу с которой будем работать
    protected $table = 'products_data_shops';

    // Указываем уникальное поле таблицы
    protected $primaryKey = 'id';

    // Есть автоинкремент
    public $incrementing = true;

    // Автоматом писать дату добавления и обновления
    public $timestamps = true;

    // Разрешенные поля для работы
    protected $fillable = [
        'id',
        'guid_shop',
        'kol',
        'created_at',
        'updated_at'
    ];

    // Связываем таблицу products_data_shops с products_data — один к одному
    public function productData() {
        return $this->hasOne('App\Models\ProductsData');
    }
}
