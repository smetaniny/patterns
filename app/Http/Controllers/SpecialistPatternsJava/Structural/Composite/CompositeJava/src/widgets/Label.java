package widgets;

public class Label extends ContentControl {

    // Конструктор с параметром для создания метки с заданным текстом
    public Label(String text) {
        super(text); // Вызов конструктора родительского класса ContentControl с передачей текста
    }

    @Override
    public boolean draw(int line) {
        if (line == 0) {
            System.out.printf(" %s ", getText()); // Вывод текста метки, обрамленного пробелами
            return true; // Возврат true, если строка отрисована
        }
        return false; // Возврат false, если строка не отрисована
    }
}
