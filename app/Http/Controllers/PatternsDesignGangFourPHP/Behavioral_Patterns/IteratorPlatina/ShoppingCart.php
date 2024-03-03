<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\IteratorPlatina;

use App\Models\Basket;
use App\Models\Products;
use App\Models\ProductsData;

/**
 * Класс, представляющий корзину покупок
 */
class ShoppingCart {
    // Приватное свойство для хранения товаров в корзине
    private $items = [];

    /**
     * Метод для получения выбранных товаров из корзины
     *
     * @return array Массив выбранных товаров
     */
    public function getSelectedItems() {
        //Получаем данные из корзины
        $productsID = Products::leftJoin('basket', 'basket.product_id', '=', 'products.id')
            ->where('user_id', 9525)
            ->select(
                'products.status',
                'basket.product_id',
                'basket.product_data_id'
            )->get();
        $product_id = [];
        $product_data_id = [];

        foreach ($productsID as $v) {
            if ($v['status'] === null) {
                Basket::where('basket.user_id', '=', 9525)
                    ->where('basket.product_id', '=', $v['product_id'])
                    ->where('basket.product_data_id', '=', $v['product_data_id'])->delete();
            } else {
                if (array_search($v['product_id'], $product_id) === false) {
                    $product_id[] = $v['product_id'];
                }

                if (array_search($v['product_data_id'], $product_data_id) === false) {
                    $product_data_id[] = $v['product_data_id'];
                }
            }
        }

        $productsData = ProductsData::rightJoin('basket', 'basket.product_data_id', '=', 'products_data.id')
            ->with('productDataShop')
            ->whereIn('products_data.id', $product_data_id)
            ->where('basket.user_id', 9525)
            ->leftJoin('products', 'products.id', '=', 'products_data.product_id')
            ->whereIn('products.id', $product_id)
            ->select(
                'basket.*',
                'basket.created_at as created_at_basket',
                'products.*',
                'products_data.*',
            )->get();


        //сравним количество в корзине с реальным остатком
        foreach ($productsData as $v) {
            $v['id'] = $v['product_id'];
            $v['count'] = $v['kol'] === 0 ? intval($v['count']) : min(intval($v['count']), intval($v['kol']));
        }

        $this->items = $productsData;
        return $productsData;
    }

    /**
     * Метод для получения с учетом скидки товаров из корзины
     *
     * @param $actions Массив с действиями скидок
     *
     * @return array Массив с учетом скидки товаров
     */
    public function getDiscountedItems($actions) {
        // Создание массива для хранения товаров с учетом скидки
        $discountedItems = [];

        // Перебор элементов корзины
        foreach ($this->items as $item) {
            // Получение продукта и его количества из элемента корзины
            $count = $item->count;

            // Применение действий скидок к каждому товару в корзине
            for ($i = 0; $i < $count; $i++) {
                foreach ($actions as $action) {
                    // Применяем акцию в зависимости от типа
                    $action->apply($item);
                    // Добавьте другие типы акций по аналогии
                }
                // Создание клонов продукта с учетом скидки
                $discountedItems[] = clone $item;
            }

        }
        // Возвращение массива с учетом скидки товаров
        return $discountedItems;
    }

}
