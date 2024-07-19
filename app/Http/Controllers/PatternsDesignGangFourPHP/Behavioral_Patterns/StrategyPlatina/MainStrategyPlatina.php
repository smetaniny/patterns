<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\StrategyPlatina;

/**
 * Этот пример представляет собой использование паттерна стратегии (Strategy) в контексте создания карточек товаров с
 * различными способами отображения.
 */
class MainStrategyPlatina
{
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
