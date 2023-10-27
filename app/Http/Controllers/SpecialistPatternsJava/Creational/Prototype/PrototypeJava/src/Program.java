import java.util.HashMap;
import java.util.Map;

public class Program {
    // Определение базовой точки по умолчанию
    static final Point DEFAULT_POINT = new Point(0, 0);

    // Хранилище прототипов точек
    static Map<String, Prototype> protos;

    // Инициализация хранилища прототипов
    static {
        protos = new HashMap<String, Prototype>();
        protos.put("default", new ColorPoint(0, 0, "black"));
        protos.put("red", new ColorPoint(0, 0, "red"));
        protos.put("green", new ColorPoint(0, 0, "green"));
    }

    // Метод для создания точки на основе прототипа по умолчанию
    public static Point createPoint() {
        return DEFAULT_POINT.clone();
    }

    public static void main(String[] args) {
        // Создание точки с использованием метода createPoint()
        Point p = createPoint();
        System.out.println(p);

        // Создание красной точки с использованием статического метода createRedPoint() класса Prototype
        Prototype red = Prototype.createRedPoint();
        System.out.println(red);
    }
}
