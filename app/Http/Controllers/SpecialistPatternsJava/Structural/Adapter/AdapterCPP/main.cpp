#include <iostream>
#include <locale>

#include "WeatherService.h"
#include "RussianWeather.h"
#include "USWeatherAdapter.h"

int main(int argc, char** argv) {
	setlocale(LC_ALL, "rus");
	
	WeatherService* service = new RussianWeather();
	service->setPosition("Москва");
	//service->setPosition("Санкт-Петербург");
	
	cout << "Москва" << endl;
	cout << "Температура (C)          : " << 
			service->getTemperature() << endl;
	cout << "Скорость ветра (м/с)     : " << 
			service->getWind() << endl;
	cout << "Ощущаемая температура (C): " << 
			service->getFeelsLikeTemperature() << endl;

	//не работает - не совместимы интерфейсы
	//WeatherService* us_service = new USWeatherService();
	
	// используем адаптер
	WeatherService* us_service = new USWeatherAdapter();
	us_service->setPosition("Нью-Йорк");
	//us_service->setPosition("Вашингтон");
	
	cout << "Нью-Йорк" << endl;
	cout << "Температура (C)          : " << 
			us_service->getTemperature() << endl;
	cout << "Скорость ветра (м/с)     : " << 
			us_service->getWind() << endl;
	cout << "Ощущаемая температура (C): " << 
			us_service->getFeelsLikeTemperature() << endl;
	
	delete service;
	delete us_service;
			
	return 0;
}
