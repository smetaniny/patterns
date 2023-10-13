#ifndef __US_WEATHER_ADAPTER__
#define __US_WEATHER_ADAPTER__

#include "USWeatherService.h"

/**
 * Адаптер класса
 */
class USWeatherAdapter : public WeatherService, private USWeatherService{
	private:
		double latitude;
	 	double longtitude;
	public:
		/*
		 * Возвращает температуру в градусах Цельсия
		 */
		double getTemperature() override {
			double tf = USWeatherService::getTemperature(latitude, longtitude);
			return (tf-32)*5/9; // F -> C
		}

		/*
		 * Возвращает скорость ветра в м/с
		 */
		double getWind() override{
			double windFtMin = USWeatherService::getWind(latitude, longtitude);
			return windFtMin / 196.85; // ft/min -> m/s
		}

		/*
		 * Возвращает ощущаемую температуру в градусах Цельсия
		 */
		double getFeelsLikeTemperature() override{
			return 1.04*getTemperature()-getWind()*0.65-0.9; // высокая влажность
		}

		void setPosition(string city) override{
			if (city == "Вашингтон") {
				latitude = 38.53;
				longtitude = 77.02;
			}
			else
				if (city == "Нью-Йорк") {
					latitude = 40.43;
					longtitude = 73.59;
				}
		}

};
#endif

