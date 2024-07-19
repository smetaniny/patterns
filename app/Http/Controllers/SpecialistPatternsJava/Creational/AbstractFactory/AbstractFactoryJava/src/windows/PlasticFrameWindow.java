package windows;

import static java.lang.System.out;

// Класс PlasticFrameWindow представляет окно с пластиковой рамой.
public class PlasticFrameWindow implements Window {

    // Метод open() открывает окно.
    @Override
    public void open() {
        out.println("Открытие пластикового окна");
    }

    // Метод close() закрывает окно.
    @Override
    public void close() {
        out.println("Закрытие пластикового окна");
    }

    // Метод install() выполняет установку окна.
    @Override
    public Window install() {
        out.println("Установка пластикового окна");
        return this;
    }
}
