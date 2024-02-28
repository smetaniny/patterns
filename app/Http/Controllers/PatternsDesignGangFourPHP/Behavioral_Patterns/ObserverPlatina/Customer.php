<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\ObserverPlatina;

/**
 * Конкретный наблюдатель (клиент), который получает уведомления о новых поступлениях в магазин.
 */
class Customer implements Observer
{
    // Имя клиента
    private string $name;

    /**
     * Конструктор класса Customer.
     *
     * @param string $name Имя клиента.
     */
    public function __construct(string $name)
    {
        // Устанавливаем имя клиента
        $this->name = $name;
    }

    /**
     * Метод, вызываемый субъектом при обновлении состояния.
     *
     * @param JewelryShop $shop Субъект, отправляющий уведомление.
     */
    public function update(JewelryShop $shop): void
    {
        // Выводим уведомление о новых поступлениях в магазин для данного клиента
        echo "Уважаемый {$this->name}, новые ювелирные изделия поступили в магазин!<br />";
    }
}
