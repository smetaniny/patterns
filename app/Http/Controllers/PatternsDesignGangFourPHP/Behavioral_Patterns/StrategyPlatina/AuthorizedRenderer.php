<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\StrategyPlatina;

/**
 * Отрисовщик для авторизованных пользователей добавляет дополнительные сведения.
 */
class AuthorizedRenderer implements CardRenderer
{
    public function render(): void
    {
        // Отображение дополнительных сведений о товаре для авторизованных пользователей
        echo "Отображение карточки товара для авторизованного пользователя. Прайс - {$this->getPrice()} <br>";
    }

    public function getPrice(): float
    {
        return (7870 * 0.9); // Цена с 10% скидкой
    }
}
