// Класс Director представляет директора, управляющего процессом построения объекта с использованием строителя.
public class Director {
    private Builder builder;

    // Конструктор класса Director, принимающий объект строителя.
    public Director(Builder builder) {
        this.builder = builder;
    }

    // Метод make() инициирует процесс построения объекта.
    public void make(boolean withServiceLine) {
        // Сбрасываем состояние строителя.
        builder.reset();
        // Подготавливаем строителя.
        builder.prepare();
        // Выполняем основную работу строителя.
        builder.mainWork();
        // Если требуется, добавляем дополнительные компоненты.
        if (withServiceLine)
            builder.addServiceLines();
        // Завершаем процесс построения объекта.
        builder.finish();
    }
}
