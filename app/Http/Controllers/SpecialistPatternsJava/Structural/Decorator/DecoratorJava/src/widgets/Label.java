package widgets;

public class Label extends ContentControl {

    // Конструктор с параметром для создания метки с заданным текстом
    public Label(String text) {
        super(text);
    }

    // Метод для отрисовки метки на указанной строке
    @Override
    public boolean draw(int line) {
        if (line == 0) {
            System.out.printf(" %s ", getText());
            return true;
        }
        return false; // Метка занимает только одну строку, поэтому другие строки не отрисовываются
    }
}
