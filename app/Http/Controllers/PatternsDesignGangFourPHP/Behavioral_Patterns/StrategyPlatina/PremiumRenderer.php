<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\StrategyPlatina;

/**
 * Отрисовщик для премиум-пользователей предоставляет эксклюзивные сведения.
 */
class PremiumRenderer implements CardRenderer
{
    public function render(): void
    {
        // Отображение эксклюзивных сведений о товаре для премиум-пользователей
        echo "Отображение карточки товара для премиум-пользователя. Прайс - {$this->getPrice()} <br>";
    }

    public function getPrice(): float
    {
        return (7870 * 0.7); // Цена с 30% скидкой
    }
}
