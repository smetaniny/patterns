public class ColorPoint extends Point implements Prototype {
    String color;

    // Конструктор класса ColorPoint, принимающий координаты x, y и цвет.
    public ColorPoint(int x, int y, String color) {
        super(x, y);
        this.color = color;
    }

    // Конструктор класса ColorPoint, создающий копию существующей точки ColorPoint.
    public ColorPoint(ColorPoint p) {
        this(p.x, p.y, p.color);
    }

    // Метод Clone() для создания клона (копии) текущего объекта ColorPoint.
    @Override
    public ColorPoint Clone() {
        return new ColorPoint(this);
    }

    // Переопределенный метод toString() для вывода информации о ColorPoint в виде строки.
    @Override
    public String toString() {
        return String.format("Color Point (%d,%d) %s", x, y, color);
    }
}
