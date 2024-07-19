#ifndef __US_WEATHER_SERVICE__
#define __US_WEATHER_SERVICE__

class USWeatherService {
	public:
	/*
	 * Метод для получения температуры
	 * latitude - широта
	 * longtitude - долгота
	 */
	double getTemperature(double latitude, double longtitude) {
		if (latitude == 38.53 && longtitude == 77.02) // Вашингтон
			return 86;
		else
			if (latitude == 40.43 && longtitude == 73.59) // Нью-Йорк
				return 95;
			else
				return 80;
	}

	/**
	 * Метод для получения скорости ветра в ft/min (футы в минуту)
	 * latitude - широта
	 * longtitude - долгота
	 * @return скорость ветра
	 */
	double getWind(double latitude, double longtitude) {
		if (latitude == 38.53 && longtitude == 77.02) // Вашингтон
			return 1000;
		else
			if (latitude == 40.43 && longtitude == 73.59) // Нью-Йорк
				return 2000;
			else
				return 1500;
	}
};

#endif
