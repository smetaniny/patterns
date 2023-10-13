import static java.lang.System.out;
public class Program {

	public static void main(String[] args) {
		// �� ����� �������� ���� ������ ���������, ��� ������� ���. ��������
		//WeatherService service = new RemoteRussianWeatherService();
		
		// ������� ���������� ������
		try (RussianWeatherProxy service = new RussianWeatherProxy()) { 
		
			service.setPosition("������");
			
			System.out.println("������");
			out.printf("����������� (C)          : %4.1f\n", 
					service.getTemperature());
			out.printf("�������� ����� (�/�)     : %4.1f\n", 
					service.getWind());
			out.printf("��������� ����������� (C): %4.1f\n", 
					service.getFeelsLikeTemperature());
		}
		
	}

}
