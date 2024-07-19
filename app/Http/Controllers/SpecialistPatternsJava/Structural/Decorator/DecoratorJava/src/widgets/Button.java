package widgets;
import static java.lang.System.out;

public class Button extends ContentControl {
    final static char BUTTON_FRAME = '*';

    // Конструктор по умолчанию для создания кнопки без текста
    public Button() {
        super();
    }

    // Конструктор с параметром для создания кнопки с заданным текстом
    public Button(String text) {
        super(text);
    }

    // Приватный метод для печати рамки кнопки
    private void printBorder() {
        for(int i = 0; i < getText().length(); i++)
            out.print(BUTTON_FRAME);
    }

    // Метод для отрисовки компонента на указанной строке
    @Override
    public boolean draw(int line) {
        if (line == 0 || line == 2) {
            out.print(BUTTON_FRAME);
            printBorder();
            out.print(BUTTON_FRAME);
            return true;
        }
        if (line == 1) {
            out.print(BUTTON_FRAME);
            out.print(getText());
            out.print(BUTTON_FRAME);
            return true;
        }
        return false;
    }

    // Метод для получения высоты компонента (кнопки)
    @Override
    public int getHeight() {
        return 3; // Высота кнопки равна 3 строкам
    }
}
