<?php

namespace App\Http\Controllers\SpecialistPatterns\Adapter\AdapterObject;

use JetBrains\PhpStorm\Pure;

class USWeatherAdapter implements WeatherService
{
    // Широта
    private float $latitude;
    // Долгота
    private float $longitude;
    private USWeatherService $service;

    /**
     * Конструктор класса USWeatherAdapter
     *
     * @param USWeatherService $service Исходный сервис для получения данных о погоде в США
     */
    public function __construct(USWeatherService $service)
    {
        $this->service = $service;
    }

    #[Pure] public function getTemperature(): float
    {
        $tf = $this->service->getTemperature($this->latitude, $this->longitude);
        return ($tf - 32) * 5 / 9; // Перевод из Фаренгейтов в Цельсии
    }

    #[Pure] public function getWind(): float
    {
        $windFtMin = $this->service->getWind($this->latitude, $this->longitude);
        return $windFtMin / 196.85; // Перевод из футов в минуту в м/с
    }

    #[Pure] public function getFeelsLikeTemperature(): float
    {
        return 1.04 * $this->getTemperature() - $this->getWind() * 0.65 - 0.9; // Расчет ощущаемой температуры
    }

    public function setPosition($city): void
    {
        // Устанавливаем координаты в зависимости от выбранного города
        switch ($city) {
            case "Вашингтон":
                $this->latitude = 38.53;
                $this->longitude = 77.02;
                break;
            case "Нью-Йорк":
                $this->latitude = 40.43;
                $this->longitude = 73.59;
                break;
        }
    }
}
