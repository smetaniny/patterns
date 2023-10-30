<?php

namespace App\Http\Controllers\SpecialistPatterns\Adapter\AdapterClass;

class ProgramSpecialistAdapterClass
{
    public function index()
    {
        // Подключение класса USWeatherAdapter

        // Установка русской локали для вывода
        setlocale(LC_ALL, "ru_RU.UTF-8");

        // Создание объекта RussianWeather, предоставляющего информацию о погоде в России
        $service = new RussianWeather();
        $service->setPosition("Москва"); // Установка города (Москва)
        // $service->setPosition("Санкт-Петербург"); // Можно установить другой город

        echo "Москва<br />";
        echo "Температура (C): " . $service->getTemperature() . "<br />";
        echo "Скорость ветра (м/с): " . $service->getWind() . "<br />";
        echo "Ощущаемая температура (C): " . $service->getFeelsLikeTemperature() . "<br />";

        // Создание объекта USWeatherAdapter, адаптирующего интерфейс для получения погоды в США
        $us_service = new USWeatherAdapter();
        $us_service->setPosition("Нью-Йорк"); // Установка города (Нью-Йорк)
        // $us_service->setPosition("Вашингтон"); // Можно установить другой город

        echo "Нью-Йорк<br />";
        echo "Температура (C): " . $us_service->getTemperature() . "<br />";
        echo "Скорость ветра (м/с): " . $us_service->getWind() . "<br />";
        echo "Ощущаемая температура (C): " . $us_service->getFeelsLikeTemperature() . "<br />";

        // Освобождение памяти
        unset($service);
        unset($us_service);
    }
}







