#ifndef __WEATHER_SERVICE__
#define __WEATHER_SERVICE__

#include <string>

using namespace std;

class WeatherService {
	public:
		virtual double getTemperature() = 0;
		virtual double getWind() = 0;
		virtual double getFeelsLikeTemperature() = 0;
		virtual void setPosition(string city) = 0;		
	
};
#endif
