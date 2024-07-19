import static java.lang.System.out;

public class HouseBuilder implements Builder {

    private House house;

    // Сброс текущего состояния строительства
    @Override
    public void reset() {
        house = new House();
    }

    // Подготовка фундамента
    @Override
    public void perpare() {
        out.println("Подготовка фундамента");
        house.setBase(true);
    }

    // Основные строительные работы
    @Override
    public void mainWork() {
        out.println("Основные строительные работы");
        house.setBuilding(true);
    }

    // Добавление инженерных коммуникаций
    @Override
    public void addServiceLines() {
        out.println("Добавление инженерных коммуникаций");
        house.setServiceLines(true);
    }

    // Завершение строительства
    @Override
    public void finsish() {
        out.println("Завершение строительства");
        house.setFinish(true);
    }

    // Возвращаем  результат
    public House getResult() {
        return house;
    }
}
