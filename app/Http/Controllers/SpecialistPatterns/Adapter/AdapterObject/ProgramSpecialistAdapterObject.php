<?php

namespace App\Http\Controllers\SpecialistPatterns\Adapter\AdapterObject;

use App\Http\Controllers\SpecialistPatterns\Adapter\AdapterClass\RussianWeather;

class ProgramSpecialistAdapterObject
{
    public static function index()
    {
        // Создаем объект WeatherService, который использует реализацию RussianWeather
        $service = new RussianWeather();
        // Устанавливаем местоположение для получения российской погоды
        $service->setPosition("Москва");
        // Комментарий: можно также установить другое местоположение, но закомментировано

        // Вывод информации о погоде для Москвы
        echo "Погода в Москве<br>";
        printf("Температура (°C)          : %4.1f<br>", $service->getTemperature());
        printf("Скорость ветра (м/с)     : %4.1f<br>", $service->getWind());
        printf("Ощущаемая температура (°C): %4.1f<br>", $service->getFeelsLikeTemperature());

        // Комментарий: Закомментирован код, который меняет источник погоды на USWeatherService

        // Создание адаптера USWeatherAdapter для USWeatherService
        $service = new USWeatherAdapter(new USWeatherService());
        $service->setPosition("Нью-Йорк");
        // Комментарий: можно также установить другое местоположение, но закомментировано

        // Вывод информации о погоде для Нью-Йорка
        echo "Погода в Нью-Йорке<br>";
        printf("Температура (°C)          : %4.1f<br>", $service->getTemperature());
        printf("Скорость ветра (м/с)     : %4.1f<br>", $service->getWind());
        printf("Ощущаемая температура (°C): %4.1f<br>", $service->getFeelsLikeTemperature());
    }
}
