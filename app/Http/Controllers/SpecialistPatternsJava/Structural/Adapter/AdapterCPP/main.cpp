#include <iostream>
#include <locale>

#include "WeatherService.h" // Включение заголовочного файла для интерфейса WeatherService
#include "RussianWeather.h" // Включение заголовочного файла для класса RussianWeather
#include "USWeatherAdapter.h" // Включение заголовочного файла для класса USWeatherAdapter

int main(int argc, char** argv) {
	setlocale(LC_ALL, "rus"); // Установка русской локали для вывода

	// Создание объекта RussianWeather, предоставляющего информацию о погоде в России
	WeatherService* service = new RussianWeather();
	service->setPosition("Москва"); // Установка города (Москва)
	// service->setPosition("Санкт-Петербург"); // Можно установить другой город

	cout << "Москва" << endl;
	cout << "Температура (C)          : " <<
			service->getTemperature() << endl;
	cout << "Скорость ветра (м/с)     : " <<
			service->getWind() << endl;
	cout << "Ощущаемая температура (C): " <<
			service->getFeelsLikeTemperature() << endl;

	// Создание объекта USWeatherAdapter, адаптирующего интерфейс для получения погоды в США
	WeatherService* us_service = new USWeatherAdapter();
	us_service->setPosition("Нью-Йорк"); // Установка города (Нью-Йорк)
	// us_service->setPosition("Вашингтон"); // Можно установить другой город

	cout << "Нью-Йорк" << endl;
	cout << "Температура (C)          : " <<
			us_service->getTemperature() << endl;
	cout << "Скорость ветра (м/с)     : " <<
			us_service->getWind() << endl;
	cout << "Ощущаемая температура (C): " <<
			us_service->getFeelsLikeTemperature() << endl;

	// Освобождение памяти
	delete service;
	delete us_service;

	return 0;
}
