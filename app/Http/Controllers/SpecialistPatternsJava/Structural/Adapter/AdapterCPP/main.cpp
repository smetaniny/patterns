#include <iostream>
#include <locale>

#include "WeatherService.h"
#include "RussianWeather.h"
#include "USWeatherAdapter.h"

int main(int argc, char** argv) {
	setlocale(LC_ALL, "rus");
	
	WeatherService* service = new RussianWeather();
	service->setPosition("������");
	//service->setPosition("�����-���������");
	
	cout << "������" << endl;
	cout << "����������� (C)          : " << 
			service->getTemperature() << endl;
	cout << "�������� ����� (�/�)     : " << 
			service->getWind() << endl;
	cout << "��������� ����������� (C): " << 
			service->getFeelsLikeTemperature() << endl;

	//�� �������� - �� ���������� ����������
	//WeatherService* us_service = new USWeatherService();
	
	// ���������� �������
	WeatherService* us_service = new USWeatherAdapter();
	us_service->setPosition("���-����");
	//us_service->setPosition("���������");
	
	cout << "���-����" << endl;
	cout << "����������� (C)          : " << 
			us_service->getTemperature() << endl;
	cout << "�������� ����� (�/�)     : " << 
			us_service->getWind() << endl;
	cout << "��������� ����������� (C): " << 
			us_service->getFeelsLikeTemperature() << endl;
	
	delete service;
	delete us_service;
			
	return 0;
}
