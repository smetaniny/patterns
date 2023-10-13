#ifndef __RUSSIAN_WEATHER__
#define __RUSSIAN_WEATHER__

#include "WeatherService.h"

class RussianWeather : public WeatherService {
	private:
		string city;
	
	public:
		/*
		 * Возвращает температуру в градусах Цельсия
		 */
		double getTemperature() override {
			if (city == "Москва") return 25;
			if (city == "Санкт-Петербург") return 18;
			return 20;
		}

		/*
		 * Возвращает скорость ветра в м/с
		 */
		double getWind() override{
			if (city == "Москва") return 5;
			if (city == "Санкт-Петербург") return 13;
			return 1;
		}

		/*
		 * Возвращает ощущаемую температуру в градусах Цельсия
		 */
		double getFeelsLikeTemperature() override{
			if (city == "Москва") return 23;
			if (city == "Санкт-Петербург") return 16;
			return 20;
		}

		void setPosition(string city) override{
			this->city = city;
		}

};

#endif

