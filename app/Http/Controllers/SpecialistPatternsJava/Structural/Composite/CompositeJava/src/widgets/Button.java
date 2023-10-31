package widgets;
import static java.lang.System.out;

public class Button extends ContentControl {
    final static char BUTTON_FRAME = '*'; // Символ для рамки кнопки

    // Конструктор по умолчанию создает пустую кнопку
    public Button() {
        super(); // Вызов конструктора родительского класса ContentControl
    }

    // Конструктор с параметром для создания кнопки с текстом
    public Button(String text) {
        super(text); // Вызов конструктора родительского класса с передачей текста
    }

    // Приватный метод для вывода рамки кнопки
    private void printBorder() {
        for (int i = 0; i < getText().length(); i++)
            out.print(BUTTON_FRAME); // Вывод символов рамки
    }

    // Переопределенный метод для отрисовки кнопки
    @Override
    public boolean draw(int line) {
        if (line == 0 || line == 2) {
            out.print(BUTTON_FRAME); // Вывод верхней и нижней рамки
            printBorder(); // Вывод рамки вокруг текста
            out.print(BUTTON_FRAME);
            return true; // Возврат true, если строка отрисована
        }
        if (line == 1) {
            out.print(BUTTON_FRAME); // Вывод левой рамки
            out.print(getText()); // Вывод текста кнопки
            out.print(BUTTON_FRAME); // Вывод правой рамки
            return true; // Возврат true, если строка отрисована
        }
        return false; // Возврат false, если строка не отрисована
    }

    // Метод для получения высоты кнопки (в данном случае, всегда 3 строки)
    @Override
    public int getHeight() {
        return 3;
    }
}
