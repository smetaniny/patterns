<?php

namespace App\Http\Controllers\SpecialistPatterns\Adapter\AdapterClass;


class USWeatherService
{
    /**
     * Метод для получения температуры
     *
     * @param float $latitude - широта
     * @param float $longitude - долгота
     *
     * @return float - температура
     */
    public static function getTemperature(float $latitude, float $longitude): float
    {
        if ($latitude == 38.53 && $longitude == 77.02) // Вашингтон
            return 86.0;
        elseif ($latitude == 40.43 && $longitude == 73.59) // Нью-Йорк
            return 95.0;
        else
            return 80.0;
    }

    /**
     * Метод для получения скорости ветра в ft/min (футы в минуту)
     *
     * @param float $latitude - широта
     * @param float $longitude - долгота
     *
     * @return float - скорость ветра
     */
    public static function getWind(float $latitude, float $longitude): float
    {
        if ($latitude == 38.53 && $longitude == 77.02) // Вашингтон
            return 1000.0;
        elseif ($latitude == 40.43 && $longitude == 73.59) // Нью-Йорк
            return 2000.0;
        else
            return 1500.0;
    }
}
