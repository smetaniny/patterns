<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\StrategyPlatina;

/**
 * Простой отрисовщик отображает базовую информацию о товаре.
 */
class StandardRenderer implements CardRenderer
{
    public function render(): void
    {
        // Отображение базовой информации о товаре
        echo "Отображение карточки товара для обычного пользователя. Прайс - {$this->getPrice()} <br>";
    }

    public function getPrice(): float
    {
        return 7870;
    }
}
