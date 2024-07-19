public class USWeatherAdapter implements WeatherService {

    private double latitude;       // Широта
    private double longtitude;    // Долгота
    private USWeatherService service;

    /**
     * Конструктор класса USWeatherAdapter
     * @param service Исходный сервис для получения данных о погоде в США
     */
    public USWeatherAdapter(USWeatherService service) {
        this.service = service;
    }

    @Override
    public double getTemperature() {
        double tf = service.getTemperature(latitude, longtitude);
        return (tf - 32) * 5 / 9; // Перевод из Фаренгейтов в Цельсии
    }

    @Override
    public double getWind() {
        double windFtMin = service.getWind(latitude, longtitude);
        return windFtMin / 196.85; // Перевод из футов в минуту в м/с
    }

    @Override
    public double getFeelsLikeTemperature() {
        return 1.04 * getTemperature() - getWind() * 0.65 - 0.9; // Расчет ощущаемой температуры
    }

    @Override
    public void setPosition(String city) {
        // Устанавливаем координаты в зависимости от выбранного города
        switch (city) {
            case "Вашингтон":
                latitude = 38.53;
                longtitude = 77.02;
                break;
            case "Нью-Йорк":
                latitude = 40.43;
                longtitude = 73.59;
                break;
        }
    }
}
