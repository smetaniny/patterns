<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{
    //Указываем таблицу с которой будем работать
    protected $table = 'promo_code';

    //Указываем уникальное поле таблицы
    protected $primaryKey = 'id';

    //Есть автоинкремент
    public $incrementing = true;

    //Автоматом писать дату добавления и обновления
    public $timestamps = true;

    //Разрешенные поля для работы
    protected $fillable = [
        'id',
        'name',
        'code',
        'type',
        'discount',
        'discount_sum',
        'sum_min',
        'all_max_use',
        'user_max_use',
        'published_start',
        'published_end',
        'category_add_remove',
        'metal_add_remove',
        'action_add_remove',
        'collection_add_remove',
        'created_at',
        'updated_at'
    ];

    //Связываем таблицу один ко многим
    public function promoCodeActionFilter()
    {
        return $this->hasmany('App\Models\PromoCodeActionFilter', 'promo_code_id', 'id');
    }

    //Связываем таблицу один ко многим
    public function promoCodeCategoryFilter()
    {
        return $this->hasmany('App\Models\PromoCodeCategoryFilter', 'promo_code_id', 'id');
    }

    //Связываем таблицу один ко многим
    public function promoCodeCollectionFilter()
    {
        return $this->hasmany('App\Models\PromoCodeCollectionFilter', 'promo_code_id', 'id');
    }

    //Связываем таблицу один ко многим
    public function promoCodeMetalFilter()
    {
        return $this->hasmany('App\Models\PromoCodeMetalFilter', 'promo_code_id', 'id');
    }

    //Связываем таблицу один ко многим
    public function promoCodeUserFilter()
    {
        return $this->hasmany('App\Models\PromoCodeUserFilter', 'promo_code_id', 'id');
    }
}
