<?php

namespace App\Http\Controllers\SpecialistPatterns\Adapter\AdapterClass;

use JetBrains\PhpStorm\Pure;

/**
 * Адаптер для получения погоды
 */
class USWeatherAdapter implements WeatherService
{
    private $latitude;
    private $longitude;

    /**
     * Метод для получения температуры
     */
    #[Pure] public function getTemperature(): float
    {
        $tf = USWeatherService::getTemperature($this->latitude, $this->longitude);
        // Перевод из Фаренгейта в Цельсий
        return ($tf - 32) * 5 / 9;
    }

    /**
     * Метод для получения скорости ветра в м/с
     */
    #[Pure] public function getWind(): float
    {
        $windFtMin = USWeatherService::getWind($this->latitude, $this->longitude);
        return $windFtMin / 196.85; // Перевод из футов в минуту в м/с
    }

    /**
     * Метод для получения ощущаемой температуры
     */
    #[Pure] public function getFeelsLikeTemperature(): float
    {
        // Расчет ощущаемой температуры
        return 1.04 * $this->getTemperature() - $this->getWind() * 0.65 - 0.9;
    }

    /**
     * Виртуальный метод для установки местоположения (города)
     *
     * @param string $city
     */
    public function setPosition(string $city): void
    {
        if ($city == "Вашингтон") {
            $this->latitude = 38.53;
            $this->longitude = 77.02;
        } else if ($city == "Нью-Йорк") {
            $this->latitude = 40.43;
            $this->longitude = 73.59;
        }
    }
}
