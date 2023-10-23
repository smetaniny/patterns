package windows;

import static java.lang.System.out;

// Класс WoodFrameWindow представляет окно с деревянной рамой.
public class WoodFrameWindow implements Window {

    // Метод open() открывает окно.
    @Override
    public void open() {
        out.println("Открытие деревянного окна");
    }

    // Метод close() закрывает окно.
    @Override
    public void close() {
        out.println("Закрытие деревянного окна");
    }

    // Метод install() выполняет установку окна.
    @Override
    public Window install() {
        out.println("Установка деревянного окна");
        return this;
    }
}
