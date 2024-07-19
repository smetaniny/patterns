<?php

namespace App\Http\Controllers\SpecialistPatterns\Adapter\AdapterObject;

interface WeatherService
{
    /**
     * Метод для получения температуры.
     *
     * @return float Температура в определенных единицах измерения (например, градусы Цельсия).
     */
    public function getTemperature(): float;

    /**
     * Метод для получения скорости ветра.
     *
     * @return float Скорость ветра в определенных единицах измерения (например, метры в секунду).
     */
    public function getWind(): float;

    /**
     * Метод для получения ощущаемой температуры.
     *
     * @return float Ощущаемая температура, которую чувствует человек, в определенных единицах измерения (например,
     *     градусы Цельсия).
     */
    public function getFeelsLikeTemperature(): float;

    /**
     * Метод для установки текущего городского местоположения, для которого нужно получить погодные данные.
     *
     * @param string $city Название города или другой идентификатор местоположения.
     */
    public function setPosition(string $city): void;
}
