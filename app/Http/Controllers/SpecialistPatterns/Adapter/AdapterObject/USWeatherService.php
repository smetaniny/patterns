<?php

namespace App\Http\Controllers\SpecialistPatterns\Adapter\AdapterObject;

class USWeatherService {
    /**
     * Метод для получения температуры.
     *
     * @param float $latitude - Широта
     * @param float $longitude - Долгота
     *
     * @return float|int Температура в градусах Фаренгейта
     */
    public function getTemperature(float $latitude, float $longitude): float|int
    {
        if ($latitude == 38.53 && $longitude == 77.02) // Вашингтон
            return 86;
        elseif ($latitude == 40.43 && $longitude == 73.59) // Нью-Йорк
            return 95;
        else
            return 80; // Значение по умолчанию, если координаты не соответствуют известным городам
    }

    /**
     * Метод для получения скорости ветра.
     *
     * @param float $latitude - Широта
     * @param float $longitude - Долгота
     *
     * @return float|int Скорость ветра в футах в минуту (ft/min)
     */
    public function getWind(float $latitude, float $longitude): float|int
    {
        if ($latitude == 38.53 && $longitude == 77.02) // Вашингтон
            return 1000;
        elseif ($latitude == 40.43 && $longitude == 73.59) // Нью-Йорк
            return 2000;
        else
            return 1500; // Значение по умолчанию, если координаты не соответствуют известным городам
    }
}
