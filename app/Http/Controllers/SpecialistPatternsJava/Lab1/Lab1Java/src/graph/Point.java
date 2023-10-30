package graph;

// Класс Point представляет собой графический объект - точку.
public class Point extends GraphObject {
    private Coords coords; // Объект для хранения координат точки.

    // Конструктор для создания точки с заданными координатами и цветом по умолчанию.
    public Point(int x, int y) {
        this(x, y, DEFAULT_COLOR);
    }

    // Конструктор для создания точки с заданными координатами и заданным цветом.
    public Point(int x, int y, String color) {
        super(color);
        coords = new Coords(x, y);
    }

    // Конструктор для создания копии точки.
    public Point(Point p) {
        this(p.getX(), p.getY(), p.getColor());
    }

    // Метод для получения координаты X точки.
    public int getX() {
        return coords.getX();
    }

    // Метод для установки координаты X точки.
    public void setX(int x) {
        coords.setX(x);
    }

    // Метод для получения координаты Y точки.
    public int getY() {
        return coords.getY();
    }

    // Метод для установки координаты Y точки.
    public void setY(int y) {
        coords.setY(y);
    }

    // Переопределенный метод для создания копии точки.
    @Override
    public Point clone() {
        return new Point(this);
    }

    // Переопределенный метод для отрисовки точки.
    @Override
    public void draw() {
        System.out.printf("Point (%d, %d) %s<br />", getX(), getY(), getColor());
    }
}
