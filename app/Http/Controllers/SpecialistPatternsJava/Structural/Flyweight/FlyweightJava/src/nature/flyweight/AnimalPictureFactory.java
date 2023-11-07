package nature.flyweight;

import java.util.HashMap;
import java.util.Map;

public class AnimalPictureFactory {
    Map<AnimalType, AnimalPicture> cache;

    // Приватный конструктор класса
    private AnimalPictureFactory() {
        cache = new HashMap<AnimalType, AnimalPicture>();
    }

    // Статическая константа для создания единственного экземпляра фабрики
    public static final AnimalPictureFactory instance = new AnimalPictureFactory();

    // Метод для получения изображения (Flyweight) для указанного типа животного
    public AnimalPicture getAnimalPicture(AnimalType type) {
        if (cache.containsKey(type)) {
            return cache.get(type);
        } else {
            // Если изображение для указанного типа отсутствует в кеше, создаем новое
            AnimalPicture pic = new AnimalPicture("../Images/" + type.name() + ".png");
            cache.put(type, pic);
            return pic;
        }
    }
}
