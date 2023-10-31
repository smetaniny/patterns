import decorators.CompositeTitleDecorator; // Импорт декоратора для добавления заголовка
import widgets.*; // Импорт компонентов интерфейса

public class Program {

    public static void main(String[] args) {

        // Создание главного окна с заголовком с использованием декоратора
        CompositeControl mainWin = new CompositeTitleDecorator(
            new MainWindow(), "Main Window title");

        CompositeControl frame1 = new CompositeControl();
        CompositeControl frame2 = new CompositeControl();
        frame1.add(new Label("Login")).add(new Button("OK"));
        frame2.add(new Label("Password")).add(new Button("Verify"));

        // Добавление кнопки "Print" с заголовком "CMD" с использованием декоратора
        mainWin.add(frame1).add(frame2)
            .add(new CompositeTitleDecorator(new CompositeControl(), "CMD")
                .add(new Button("Print")));

        // Отрисовка главного окна
        mainWin.draw();
    }
}
