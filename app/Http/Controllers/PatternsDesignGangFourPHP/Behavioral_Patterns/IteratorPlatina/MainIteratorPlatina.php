<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\IteratorPlatina;

/**
 * Паттерн Итератор предоставляет способ последовательного доступа к элементам составного объекта
 * без раскрытия его внутреннего представления. Он обеспечивает унифицированный интерфейс
 * для обхода различных структур данных (например, списков, массивов, деревьев) без
 * знания их внутренней реализации.
 *
 */
class MainIteratorPlatina
{
    public function index()
    {
        // Создание экземпляра действия скидки с коэффициентом 0.1 (10% скидка)
        $actions = [new DiscountAction(0.1)];


        // Создание экземпляра корзины покупок
        $cart = new ShoppingCart();

        // Получение выбранных элементов из корзины
        $selectedItems = $cart->getSelectedItems();

        // Получение с учетом скидки элементов из корзины
        $discountedItems = $cart->getDiscountedItems($actions);

        // Вывод результатов на экран (в данном случае используется dd, вероятно, для удобства отладки)
        dd($selectedItems, $discountedItems);
    }
}

