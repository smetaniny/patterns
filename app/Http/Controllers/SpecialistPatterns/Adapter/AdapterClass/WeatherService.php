<?php

namespace App\Http\Controllers\SpecialistPatterns\Adapter\AdapterClass;


interface WeatherService
{
    /**
     * Виртуальный метод для получения температуры
     *
     * @return float - температура
     */
    public function getTemperature(): float;

    /**
     * Виртуальный метод для получения скорости ветра
     *
     * @return float - скорость ветра
     */
    public function getWind(): float;

    /**
     * Виртуальный метод для получения ощущаемой температуры
     *
     * @return float - ощущаемая температура
     */
    public function getFeelsLikeTemperature(): float;

    /**
     * Виртуальный метод для установки местоположения (города)
     *
     * @param string $city - название города
     *
     * @return void
     */
    public function setPosition(string $city): void;
}
