<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //Указываем таблицу с которой будем работать
    protected $table = 'stocks';

    //Указываем уникальное поле таблицы
    protected $primaryKey = 'id';

    //Есть автоинкремент
    public $incrementing = true;

    //Автоматом писать дату добавления и обновления
    public $timestamps = true;

    //Разрешенные поля для работы
    protected $fillable = [
        'id',
        'action_id',
        'action_group_id',
        'activity',
        'on_check',
        'combining_discounts',
        'status',
        'status_product',
        'status_filter',
        'sort',
        'name',
        'stocks1c',
        'title',
        'alias',
        'description',
        'img',
        'img_mobile',
        'status_app',
        'status_app_first',
        'link_app',
        'body',
        'bodyHtml',
        'early_created_at',
        'early_description',
        'img_early',
        'who_made_edits',
        'published_start',
        'published_end',
        'sale_tip',
        'sale_discount',
        'name_product_one',
        'bg_color_one',
        'name_product_two',
        'bg_color_two',
        'text_warning',
        'marker_discount_color',
        'marker_discount_bg_color',
        'created_at',
        'updated_at'
    ];

    //Связываем таблицу stocks c stocks_conditions — один ко многим
    public function stockCondition() {
        return $this->hasmany('App\Models\StockCondition', 'stocks_id', 'id');
    }
}
