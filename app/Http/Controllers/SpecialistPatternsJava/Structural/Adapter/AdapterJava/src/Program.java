import static java.lang.System.out;
public class Program {

	public static void main(String[] args) {
		WeatherService service = new RussianWeather();
		service.setPosition("������");
		//service.setPosition("�����-���������");
		
		System.out.println("������");
		out.printf("����������� (C)          : %4.1f\n", 
				service.getTemperature());
		out.printf("�������� ����� (�/�)     : %4.1f\n", 
				service.getWind());
		out.printf("��������� ����������� (C): %4.1f\n", 
				service.getFeelsLikeTemperature());
		
		//�� �������� - �� ���������� ����������
		//service = new USWeatherService();
		
		// ���������� �������
		service = new USWeatherAdapter(new USWeatherService());
		service.setPosition("���-����");
		//service.setPosition("���������");
		
		System.out.println("���-����");
		out.printf("����������� (C)          : %4.1f\n", 
				service.getTemperature());
		out.printf("�������� ����� (�/�)     : %4.1f\n", 
				service.getWind());
		out.printf("��������� ����������� (C): %4.1f\n", 
				service.getFeelsLikeTemperature());
		

	}

}
