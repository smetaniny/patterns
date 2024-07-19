package windows;

// Интерфейс Window определяет контракт для компонентов окон дома.
public interface Window {
    // Метод open() открывает окно.
    void open();

    // Метод close() закрывает окно.
    void close();

    // Метод install() выполняет установку окна.
    Window install();
}
