<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\StrategyPlatina;

/**
 * Класс, представляющий карточку товара.
 */
class ProductCard
{
    // Объект отрисовщика карточки товара
    protected CardRenderer $renderer;

    /**
     * Конструктор класса ProductCard.
     *
     * @param CardRenderer $renderer Отрисовщик карточки товара.
     */
    public function __construct(CardRenderer $renderer)
    {
        // Устанавливаем объект отрисовщика карточки товара
        $this->renderer = $renderer;
    }

    /**
     * Метод для отображения карточки товара.
     */
    public function show()
    {
        // Показываем карточку товара с использованием соответствующего отрисовщика
        $this->renderer->render();
    }
}

