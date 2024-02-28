<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\StrategyPlatina;

/**
 * Главный класс, представляющий точку входа в пример.
 */
class MainPlatina
{
    /**
     * Этот метод представляет собой точку входа для данного примера.
     */
    function index()
    {
        // Создаем карточку товара с простым отрисовщиком
        $standardCard = new ProductCard(new StandardRenderer());
        // Создаем карточку товара с отрисовщиком для авторизованных пользователей
        $authorizedCard = new ProductCard(new AuthorizedRenderer());
        // Создаем карточку товара с отрисовщиком для премиум-пользователей
        $premiumCard = new ProductCard(new PremiumRenderer());

        // Отображаем карточку товара для обычного пользователя
        $standardCard->show();
        // Отображаем карточку товара для авторизованного пользователя
        $authorizedCard->show();
        // Отображаем карточку товара для премиум-пользователя
        $premiumCard->show();
    }
}
