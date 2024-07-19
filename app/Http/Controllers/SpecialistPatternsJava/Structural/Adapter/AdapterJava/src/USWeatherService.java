public class USWeatherService {
    /**
     * Метод для получения температуры
     * @param latitude - Широта
     * @param longitude - Долгота
     * @return Температура в градусах Фаренгейта
     */
    public double getTemperature(double latitude, double longitude) {
        if (latitude == 38.53 && longitude == 77.02) // Вашингтон
            return 86;
        else if (latitude == 40.43 && longitude == 73.59) // Нью-Йорк
            return 95;
        else
            return 80; // Значение по умолчанию, если координаты не соответствуют известным городам
    }

    /**
     * Метод для получения скорости ветра
     * @param latitude - Широта
     * @param longitude - Долгота
     * @return Скорость ветра в футах в минуту (ft/min)
     */
    public double getWind(double latitude, double longitude) {
        if (latitude == 38.53 && longitude == 77.02) // Вашингтон
            return 1000;
        else if (latitude == 40.43 and longitude == 73.59) // Нью-Йорк
            return 2000;
        else
            return 1500; // Значение по умолчанию, если координаты не соответствуют известным городам
    }
}
