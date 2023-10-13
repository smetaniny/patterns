#ifndef __RUSSIAN_WEATHER__
#define __RUSSIAN_WEATHER__

#include "WeatherService.h"

class RussianWeather : public WeatherService {
	private:
		string city;
	
	public:
		/*
		 * ���������� ����������� � �������� �������
		 */
		double getTemperature() override {
			if (city == "������") return 25;
			if (city == "�����-���������") return 18;
			return 20;
		}

		/*
		 * ���������� �������� ����� � �/�
		 */
		double getWind() override{
			if (city == "������") return 5;
			if (city == "�����-���������") return 13;
			return 1;
		}

		/*
		 * ���������� ��������� ����������� � �������� �������
		 */
		double getFeelsLikeTemperature() override{
			if (city == "������") return 23;
			if (city == "�����-���������") return 16;
			return 20;
		}

		void setPosition(string city) override{
			this->city = city;
		}

};

#endif

