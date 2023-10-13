import static java.lang.System.out;
public class Program {

	public static void main(String[] args) {
		// не будет работать если сервис удаленный, или требует доп. операций
		//WeatherService service = new RemoteRussianWeatherService();
		
		// поэтому используем прокси
		try (RussianWeatherProxy service = new RussianWeatherProxy()) { 
		
			service.setPosition("Москва");
			
			System.out.println("Москва");
			out.printf("Температура (C)          : %4.1f\n", 
					service.getTemperature());
			out.printf("Скорость ветра (м/с)     : %4.1f\n", 
					service.getWind());
			out.printf("Ощущаемая температура (C): %4.1f\n", 
					service.getFeelsLikeTemperature());
		}
		
	}

}
