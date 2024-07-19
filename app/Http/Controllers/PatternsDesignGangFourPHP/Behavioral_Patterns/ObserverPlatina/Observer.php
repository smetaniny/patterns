<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\ObserverPlatina;

/**
 * Интерфейс для наблюдателя (клиента), который подписывается на уведомления от субъекта (магазина ювелирных изделий).
 */
interface Observer
{
    /**
     * Метод, вызываемый субъектом (магазином ювелирных изделий) при обновлении состояния.
     *
     * @param JewelryShop $shop Субъект, который отправляет уведомление.
     */
    public function update(JewelryShop $shop): void;
}
