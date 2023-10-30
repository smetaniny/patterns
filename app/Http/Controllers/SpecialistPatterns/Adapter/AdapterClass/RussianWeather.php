<?php

namespace App\Http\Controllers\SpecialistPatterns\Adapter\AdapterClass;


class RussianWeather implements WeatherService
{
    // Свойство для хранения города
    private string $city;

    /**
     * Метод для получения температуры
     */
    public function getTemperature(): float
    {
        if ($this->city == "Москва") return 25.0;
        if ($this->city == "Санкт-Петербург") return 18.0;
        return 20.0;
    }

    /**
     * Метод для получения скорости ветра в м/с
     */
    public function getWind(): float
    {
        if ($this->city == "Москва") return 5.0;
        if ($this->city == "Санкт-Петербург") return 13;
        return 1;
    }

    /**
     * Метод для получения ощущаемой температуры
     */
    public function getFeelsLikeTemperature(): float
    {
        if ($this->city == "Москва") return 23;
        if ($this->city == "Санкт-Петербург") return 16;
        return 20;
    }

    /**
     * Виртуальный метод для установки местоположения (города)
     *
     * @param string $city
     */
    public function setPosition(string $city): void
    {
        $this->city = $city;
    }
}
