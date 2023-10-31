package widgets;

public abstract class UIComponent {
    // Абстрактный метод для отрисовки компонента на указанной строке
    public abstract boolean draw(int line);

    // Абстрактный метод для получения высоты компонента
    public abstract int getHeight();

    // Абстрактный метод для получения ширины компонента
    public abstract int getWidth();
}
