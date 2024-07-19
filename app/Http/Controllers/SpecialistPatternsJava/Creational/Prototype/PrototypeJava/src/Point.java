public class Point implements Cloneable {
    int x, y;

    // Конструктор класса Point, принимающий координаты x и y.
    public Point(int x, int y) {
        this.x = x;
        this.y = y;
    }

    // Конструктор класса Point, создающий копию существующей точки Point.
    public Point(Point p) {
        this(p.x, p.y);
    }

    // Метод clone() для создания клона (копии) текущего объекта Point.
    @Override
    public Point clone() {
        return new Point(this);
    }

    // Переопределенный метод toString() для вывода информации о Point в виде строки.
    @Override
    public String toString() {
        return String.format("Point (%d,%d)", x, y);
    }
}
