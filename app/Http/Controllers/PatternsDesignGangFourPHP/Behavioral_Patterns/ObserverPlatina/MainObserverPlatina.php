<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\ObserverPlatina;

/**
 * "Наблюдатель" для интернет-магазина ювелирных изделий. В этом примере будем иметь класс JewelryShop в роли
 * субъекта, который будет уведомлять своих наблюдателей (клиентов) о новых поступлениях в магазине.
 */
class MainObserverPlatina
{
    function index()
    {
        // Создаем магазин ювелирных изделий
        $shop = new JewelryShop();

        // Создаем клиентов-наблюдателей
        $customer1 = new Customer("Иван");
        $customer2 = new Customer("Мария");

        // Клиенты подписываются на уведомления о новых поступлениях
        $shop->attach($customer1);
        $shop->attach($customer2);

        // Магазин добавляет новые ювелирные изделия
        $shop->addNewJewelry();

        // Отписываем клиента-наблюдателя "Мария" от уведомлений
        $shop->detach($customer2);

        $customer3 = new Customer("Серега");
        $shop->attach($customer3);

        // Магазин снова добавляет новые ювелирные изделия
        $shop->addNewJewelry();
    }
}
