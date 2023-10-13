import static java.lang.System.out;
public class Program {

	public static void main(String[] args) {
		WeatherService service = new RussianWeather();
		service.setPosition("Москва");
		//service.setPosition("Санкт-Петербург");
		
		System.out.println("Москва");
		out.printf("Температура (C)          : %4.1f\n", 
				service.getTemperature());
		out.printf("Скорость ветра (м/с)     : %4.1f\n", 
				service.getWind());
		out.printf("Ощущаемая температура (C): %4.1f\n", 
				service.getFeelsLikeTemperature());
		
		//не работает - не совместимы интерфейсы
		//service = new USWeatherService();
		
		// используем адаптер
		service = new USWeatherAdapter(new USWeatherService());
		service.setPosition("Нью-Йорк");
		//service.setPosition("Вашингтон");
		
		System.out.println("Нью-Йорк");
		out.printf("Температура (C)          : %4.1f\n", 
				service.getTemperature());
		out.printf("Скорость ветра (м/с)     : %4.1f\n", 
				service.getWind());
		out.printf("Ощущаемая температура (C): %4.1f\n", 
				service.getFeelsLikeTemperature());
		

	}

}
