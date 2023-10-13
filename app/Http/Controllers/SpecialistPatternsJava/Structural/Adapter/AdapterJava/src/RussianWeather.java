
public class RussianWeather implements WeatherService {

	String city;
	
	/**
	 * ���������� �����������
	 * @return ����������� � �������� �������
	 */
	@Override
	public double getTemperature() {
		switch(city) {
			case "������"  : return 25;
			case "�����-���������" : return 18;
			default : return 20;
		}
	}

	/**
	 * ���������� �������� �����
	 * @return �������� ����� � �/�
	 */
	@Override
	public double getWind() {
		switch(city) {
			case "������"  : return 5;
			case "�����-���������" : return 13;
			default : return 1;
		}
	}

	/**
	 * ���������� ��������� �����������
	 * @return ����������� � �������� �������
	 */
	@Override
	public double getFeelsLikeTemperature() {
		switch(city) {
			case "������"  : return 23;
			case "�����-���������" : return 16;
			default : return 20;
		}
	}

	@Override
	public void setPosition(String city) {
		this.city = city;
	}

}
