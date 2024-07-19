public class RussianWeather implements WeatherService {

    String city; // Поле для хранения текущего местоположения

    /**
     * Метод для получения температуры
     * @return Температура в градусах Цельсия
     */
    @Override
    public double getTemperature() {
        switch(city) {
            case "Москва"  : return 25;
            case "Санкт-Петербург" : return 18;
            default : return 20;
        }
    }

    /**
     * Метод для получения скорости ветра
     * @return Скорость ветра в метрах в секунду
     */
    @Override
    public double getWind() {
        switch(city) {
            case "Москва"  : return 5;
            case "Санкт-Петербург" : return 13;
            default : return 1;
        }
    }

    /**
     * Метод для получения ощущаемой температуры
     * @return Ощущаемая температура в градусах Цельсия
     */
    @Override
    public double getFeelsLikeTemperature() {
        switch(city) {
            case "Москва"  : return 23;
            case "Санкт-Петербург" : return 16;
            default : return 20;
        }
    }

    /**
     * Метод для установки текущего местоположения
     * @param city Название города, для которого нужно получить погоду
     */
    @Override
    public void setPosition(String city) {
        this.city = city;
    }
}
