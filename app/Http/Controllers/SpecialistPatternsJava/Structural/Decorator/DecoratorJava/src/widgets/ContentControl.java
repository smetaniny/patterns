package widgets;

public abstract class ContentControl extends UIComponent {
    private String text;

    // Метод для получения текста компонента
    public String getText() {
        return text;
    }

    // Метод для установки текста компонента
    public void setText(String text) {
        this.text = text;
    }

    // Конструктор по умолчанию для создания компонента без текста
    public ContentControl() {
        this("");
    }

    // Конструктор с параметром для создания компонента с заданным текстом
    public ContentControl(String text) {
        this.text = text;
    }

    // Метод для получения ширины компонента (ширина текста + рамка)
    @Override
    public int getWidth() {
        return getText().length() + 2;
    }

    // Метод для получения высоты компонента (в данном случае, всегда 1 строка)
    @Override
    public int getHeight() {
        return 1;
    }
}
