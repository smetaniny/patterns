<?php

namespace app\Http\Controllers\SOLID\D;


use JetBrains\PhpStorm\Pure;

/**
 * SOLID
 *
 * D — Принцип инверсии зависимостей.
 * Dependency Inversion Principle, DIR
 *
 * (детали подразумевается класс)
 * Зависимости внутри системы строятся на основе абстракций. Модули верхних уровней не должны зависеть от модулей
 * нижних уровней. Оба типа модулей должны зависеть от абстракций. Абстракции не должны зависеть от деталей. Детали
 * должны зависеть от абстракций.
 * ИЛИ
 * Зависимости должны строится относительно абстракций, а не классов
 */


/**
 * Высоко ранговый мужчина (Очень умный сделает так)
 */
class HighRankingMale
{
    //Переменная провайдера еды
    private IFoodProvider $foodProvider;

    /**
     * Получается сюда мы можем передать объект класса жены или ресторана
     *
     * @param IFoodProvider $foodProvider
     */
    public function __construct(IFoodProvider $foodProvider)
    {
        $this->foodProvider = $foodProvider;
    }

    public function eat()
    {
        $food = $this->foodProvider->getFood();
        //... eat
    }
}


/**
 * Низко ранговый мужчина - так сделает новичок
 */
class lowRankingMale
{
    //метод кушать
    #[Pure] public function eat()
    {
        //Класс жена
        $wife = new Wife();
        //С помощью жены получаем еду
        $food = $wife->getFood();
        //... eat
    }
}


/**
 * Средне ранговый мужчина - так сделает середнячок
 */
class averageRankingMale
{
    private Wife $wife;

    public function __construct(Wife $wife)
    {
        $this->wife = $wife;
    }

    #[Pure] public function eat()
    {
        $food = $this->wife->getFood();
        //... eat
    }
}
























