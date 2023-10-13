import java.io.Closeable;

public class RussianWeatherProxy implements WeatherService, Closeable {
	private RemoteRussianWeatherService service; 
	
	public RussianWeatherProxy() {
		System.out.println("Open Connection");
		service = new RemoteRussianWeatherService();
	}
	
	@Override
	public void close() {
		System.out.println("Close Connection");
		
	}

	@Override
	public double getTemperature() {
		System.out.println("Send credentials for authentication...");
		return service.getTemperature();
	}

	@Override
	public double getWind() {
		System.out.println("Send credentials for authentication...");
		return service.getWind();
	}

	@Override
	public double getFeelsLikeTemperature() {
		System.out.println("Send credentials for authentication...");
		return service.getFeelsLikeTemperature();
	}

	@Override
	public void setPosition(String city) {
		System.out.println("Send credentials for authentication...");
		service.setPosition(city);
		
	}

}
