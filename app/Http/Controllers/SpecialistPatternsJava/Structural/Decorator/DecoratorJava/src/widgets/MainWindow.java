package widgets;

public class MainWindow extends CompositeControl {

    // Переопределенный метод для завершения отрисовки строки и добавления перевода строки
    @Override
    public void drawLineFinish() {
        super.drawLineFinish(); // Вызываем метод из родительского класса
        System.out.println(); // Добавляем перевод строки для разделения строк в интерфейсе
    }
}
