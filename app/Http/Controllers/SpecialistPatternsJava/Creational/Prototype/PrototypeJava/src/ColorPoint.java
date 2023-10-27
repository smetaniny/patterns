public class ColorPoint extends Point implements Prototype {
    String color;

    // ����������� ������ ColorPoint, ����������� ���������� x, y � ����.
    public ColorPoint(int x, int y, String color) {
        super(x, y);
        this.color = color;
    }

    // ����������� ������ ColorPoint, ��������� ����� ������������ ����� ColorPoint.
    public ColorPoint(ColorPoint p) {
        this(p.x, p.y, p.color);
    }

    // ����� Clone() ��� �������� ����� (�����) �������� ������� ColorPoint.
    @Override
    public ColorPoint Clone() {
        return new ColorPoint(this);
    }

    // ���������������� ����� toString() ��� ������ ���������� � ColorPoint � ���� ������.
    @Override
    public String toString() {
        return String.format("Color Point (%d,%d) %s", x, y, color);
    }
}
