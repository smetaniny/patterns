package widgets;

public class MainWindow extends CompositeControl {
    // Переопределенный метод для завершения отрисовки строки и перевода каретки
    @Override
    public void drawLineFinish() {
        super.drawLineFinish(); // Вызов метода родительского класса
        System.out.println(); // Перевод строки для перехода к следующей строке
    }
}
