// Импорт стандартного вывода, который позволит выводить информацию в консоль.
import static java.lang.System.out;

// Класс DocBuilder реализует интерфейс Builder и представляет конкретную реализацию строителя для создания объекта Documentation.
public class DocBuilder implements Builder {
    // Создаем переменную для хранения объекта документации.
    private Documentation doc;

    @Override
    public void reset() {
        // Создаем новый объект документации и связываем его с переменной doc.
        doc = new Documentation();
    }

    @Override
    public void prepare() {
        // Выводим сообщение о начале подготовки к документированию.
        out.println("Подготовка к документированию");
        // Устанавливаем флаг базовой документации в true.
        doc.setBase(true);
    }

    @Override
    public void mainWork() {
        // Выводим сообщение о начале основной работы.
        out.println("Основная работа");
        // Устанавливаем флаг состояния строительства в true.
        doc.setBuilding(true);
    }

    @Override
    public void addServiceLines() {
         // Выводим сообщение о добавлении дополнительных линий обслуживания.
        out.println("Добавление дополнительных линий обслуживания");
        // Устанавливаем флаг дополнительных линий обслуживания в true.
        doc.setServiceLines(true);
    }

    @Override
    public void finish() {
        // Выводим сообщение о завершении и документировании.
        out.println("Завершение и документирование");
         // Устанавливаем флаг завершения в true.
        doc.setFinish(true);
    }

    // Метод getResult() возвращает созданный объект документации.
    public Documentation getResult() {
        return doc;
    }
}
