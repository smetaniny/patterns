<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\StrategyPlatina;

/**
 * Интерфейс CardRenderer определяет методы для отрисовки карточки товара.
 */
interface CardRenderer
{
    public function render(): void;

    /**
     * Метод для получения цены товара.
     */
    public function getPrice(): float;

}
