package graph;

// Класс ColorGOFactory представляет собой фабрику для создания цветных графических объектов.
public class ColorGOFactory extends AbstractGOFactory {
    // Статическое поле для хранения объекта Point по умолчанию.
    public static final Point DEFAULT_POINT = new Point(0, 0);

    // Переопределение метода для создания объекта Point.
    @Override
    public Point createPoint() {
        Point p = DEFAULT_POINT.clone(); // Клонируем объект Point по умолчанию.
        Scene.instance.add(p); // Добавляем точку в сцену.
        return p;
    }

    // Переопределение метода для создания объекта Circle.
    @Override
    public Circle createCircle() {
        Circle c = new Circle(0, 0, 1); // Создаем окружность с начальными параметрами.
        Scene.instance.add(c); // Добавляем окружность в сцену.
        return c;
    }
}
