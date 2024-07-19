package graph;

// Абстрактный класс AbstractGOFactory представляет собой фабрику для создания графических объектов.
public abstract class AbstractGOFactory {
    // Абстрактный метод для создания объекта класса Point.
    public abstract Point createPoint();

    // Абстрактный метод для создания объекта класса Circle.
    public abstract Circle createCircle();
}
