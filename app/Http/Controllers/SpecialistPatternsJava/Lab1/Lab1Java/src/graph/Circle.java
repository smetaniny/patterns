package graph;

// Класс Circle представляет собой графический объект - окружность.
public class Circle extends GraphObject {
    private Coords center; // Центр окружности.
    private int r; // Радиус окружности.

    // Конструктор для создания окружности с заданными координатами центра, радиусом и цветом.
    public Circle(int x, int y, int r) {
        this(x, y, r, DEFAULT_COLOR);
    }

    // Конструктор для создания окружности с заданными координатами центра, радиусом и цветом.
    public Circle(int x, int y, int r, String color) {
        super(color);
        center = new Coords(x, y);
        this.r = r;
    }

    // Конструктор для создания копии окружности.
    public Circle(Circle c) {
        this(c.getX(), c.getY(), c.getR(), c.getColor());
    }

    // Метод для получения радиуса окружности.
    public int getR() {
        return r;
    }

    // Метод для установки радиуса окружности.
    public void setR(int r) {
        this.r = r;
    }

    // Метод для получения координаты X центра окружности.
    public int getX() {
        return center.getX();
    }

    // Метод для установки координаты X центра окружности.
    public void setX(int x) {
        center.setX(x);
    }

    // Метод для получения координаты Y центра окружности.
    public int getY() {
        return center.getY();
    }

    // Метод для установки координаты Y центра окружности.
    public void setY(int y) {
        center.setY(y);
    }

    // Переопределенный метод для создания копии окружности.
    @Override
    public Circle clone() {
        return new Circle(this);
    }

    // Переопределенный метод для отрисовки окружности.
    @Override
    public void draw() {
        System.out.printf("Circle (%d, %d) R: %d %s<br />", getX(), getY(), getR(), getColor());
    }
}
