#ifndef __WEATHER_SERVICE__
#define __WEATHER_SERVICE__

#include <string>

using namespace std;

// Объявление класса WeatherService
class WeatherService {
	public:
		// Виртуальный метод для получения температуры
		virtual double getTemperature() = 0;

		// Виртуальный метод для получения скорости ветра
		virtual double getWind() = 0;

		// Виртуальный метод для получения ощущаемой температуры
		virtual double getFeelsLikeTemperature() = 0;

		// Виртуальный метод для установки местоположения (города)
		virtual void setPosition(string city) = 0;
};

#endif
