import widgets.*;

public class Program {

    public static void main(String[] args) {
        // Создаем главное окно с использованием паттерна Builder
        CompositeControl mainWin = new MainWindow();

        // Создаем два рамки (CompositeControl) и добавляем в них виджеты
        CompositeControl frame1 = new CompositeControl();
        CompositeControl frame2 = new CompositeControl();
        frame1.add(new Label("Login")).add(new Button("OK"));
        frame2.add(new Label("Password")).add(new Button("Verify"));

        // Добавляем рамки и еще одну кнопку в главное окно
        mainWin.add(frame1).add(frame2).
            add(new CompositeControl().add(new Button("Print")));

        // Отображаем главное окно
        mainWin.draw();
    }
}
