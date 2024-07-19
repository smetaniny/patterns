package widgets;

public abstract class ContentControl extends UIComponent {
    private String text; // Текстовое содержимое компонента

    public String getText() {
        return text;
    }

    public void setText(String text) {
        this.text = text;
    }

    // Конструктор по умолчанию создает контрол с пустым текстом
    public ContentControl() {
        this("");
    }

    // Конструктор с параметром для создания контрола с заданным текстом
    public ContentControl(String text) {
        this.text = text;
    }

    @Override
    public int getWidth() {
        return getText().length() + 2; // Ширина контрола равна длине текста плюс левая и правая рамки
    }

    @Override
    public int getHeight() {
        return 1; // Высота контрола всегда равна 1 строке
    }
}
