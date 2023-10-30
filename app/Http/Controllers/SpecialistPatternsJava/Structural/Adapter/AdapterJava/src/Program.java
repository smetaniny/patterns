import static java.lang.System.out;

// Адаптер на уровне объекта
public class Program {

    public static void main(String[] args) {
        // Создание объекта WeatherService, который использует реализацию RussianWeather
        WeatherService service = new RussianWeather();
        // Установка местоположения для получения российской погоды
        service.setPosition("Москва");
        // Комментарий: можно также установить другое местоположение, но закомментировано

        // Вывод информации о погоде для Москвы
        System.out.println("Погода в Москве");
        out.printf("Температура (C)          : %4.1f<br />", service.getTemperature());
        out.printf("Скорость ветра (м/с)     : %4.1f<br />", service.getWind());
        out.printf("Ощущаемая температура (C): %4.1f<br />", service.getFeelsLikeTemperature());

        // Комментарий: Закомментирован код, который меняет источник погоды на USWeatherService

        // Создание адаптера USWeatherAdapter для USWeatherService
        service = new USWeatherAdapter(new USWeatherService());
        service.setPosition("Нью-Йорк");
        // Комментарий: можно также установить другое местоположение, но закомментировано

        // Вывод информации о погоде для Нью-Йорка
        System.out.println("Погода в Нью-Йорке");
        out.printf("Температура (C)          : %4.1f<br />", service.getTemperature());
        out.printf("Скорость ветра (м/с)     : %4.1f<br />", service.getWind());
        out.printf("Ощущаемая температура (C): %4.1f<br />", service.getFeelsLikeTemperature());
    }
}
