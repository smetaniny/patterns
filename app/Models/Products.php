<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Модель для работы с таблицей товаров
 *
 * Class Products
 * @package App
 * @method static where(string $string, int $int)
 * @method static whereIn(string $string, string[] $array)
 * @method static leftJoin(string $string, string $string1, string $string2, string $string3)
 */
class Products extends Model
{

    // Указываем таблицу с которой будем работать
    protected $table = 'products';

    // Указываем уникальное поле таблицы
    protected $primaryKey = 'id';

    // Есть авто инкремент
    public $incrementing = true;

    // Автоматом писать дату добавления и обновления
    public $timestamps = true;

    // Разрешенные поля для работы
    protected $fillable = [
        'id',
        'guid',
        'model',
        'article',
        'articleNotDash',
        'h1',
        'text',
        'title',
        'description',
        'show',
        'stocksNameAlias',
        'categoryAlias',
        'viewAlias',
        'insertsAlias',
        'insertsColorAlias',
        'metalAlias',
        'metalTypeAlias',
        'sexAlias',
        'viewDesignAlias',
        'thematicsAlias',
        'collectionAlias',
        'category',
        'img',
        'imgDetail',
        'imgModel',
        'imgBasic',
        'view',
        'inserts',
        'insertsColor',
        'metal',
        'metalType',
        'sex',
        'price',
        'saved_price',
        'size',
        'sizeAlias',
        'weight',
        'ratingAVG',
        'ratingCount',
        'viewDesign',
        'thematics',
        'collection',
        'ordersort',
        'garnitur',
        'stockAlias',
        'status',
        'grup',
        'description',
        'action',
        'hit',
        'new',
        'productWidth',
        'productMetal',
        'stocksName',
        'card_discount',
        'card_price',
        'date_end_stock',
        'marker_discount_color',
        'marker_discount_bg_color',
        'kol',
        'created_at',
        'updated_at',
        'online_discount',
        'bonuses_subtract_1',
        'bonuses_subtract_2',
        'bonuses_subtract_3',
        'bonuses_subtract_4',
        'promo_code_subtract',
        'promo_code_text',
        'weaving',
        'weavingAlias',
    ];

    // Связываем таблицу products c products_data — один ко многим
    public function productData()
    {
        return $this->hasmany('App\Models\ProductsData', 'product_id', 'id');
    }


    // Отношение один к одному к модели Orders(заказы)
    public function returnOrdersProducts()
    {
        return $this->belongsTo(ReturnOrdersProducts::class, 'product_id');
    }
}
