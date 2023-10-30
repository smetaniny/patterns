package graph;

// Класс Coords представляет собой объект для хранения координат (x, y).
public class Coords {
    private int x;
    private int y;

    // Конструктор класса, инициализирующий координаты (x, y).
    public Coords(int x, int y) {
        this.x = x;
        this.y = y;
    }

    // Метод для получения значения координаты X.
    public int getX() {
        return x;
    }

    // Метод для установки значения координаты X.
    public void setX(int x) {
        this.x = x;
    }

    // Метод для получения значения координаты Y.
    public int getY() {
        return y;
    }

    // Метод для установки значения координаты Y.
    public void setY(int y) {
        this.y = y;
    }
}
