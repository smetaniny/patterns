package graph;

// Абстрактный класс GraphObject представляет собой абстрактный графический объект.
public abstract class GraphObject implements Cloneable {
    public static final String DEFAULT_COLOR = "black"; // Константа для цвета по умолчанию.
    private String color; // Приватное поле для хранения цвета объекта.

    // Конструктор по умолчанию, инициализирующий объект с цветом по умолчанию.
    public GraphObject() {
        this(DEFAULT_COLOR);
    }

    // Конструктор, позволяющий инициализировать объект с заданным цветом.
    public GraphObject(String color) {
        super();
        this.color = color;
    }

    // Метод для получения цвета объекта.
    public String getColor() {
        return color;
    }

    // Метод для установки цвета объекта.
    public void setColor(String color) {
        this.color = color;
    }

    // Абстрактный метод для отрисовки объекта, который должен быть реализован в подклассах.
    public abstract void draw();
}
