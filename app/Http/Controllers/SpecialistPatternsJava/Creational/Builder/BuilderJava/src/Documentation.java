// Класс Documentation представляет объект документации и содержит информацию о создании документации.
public class Documentation {
     // Флаг для базовой документации
    private boolean base = false;
       // Флаг для состояния строительства
    private boolean building = false;
     // Флаг для дополнительных линий обслуживания
    private boolean serviceLines = false;
        // Флаг для завершения
    private boolean finish = false;

    // Геттер для флага базовой документации.
    public boolean isBase() {
        return base;
    }

    // Сеттер для флага базовой документации.
    public void setBase(boolean base) {
        this.base = base;
    }

    // Геттер для флага состояния строительства.
    public boolean isBuilding() {
        return building;
    }

    // Сеттер для флага состояния строительства.
    public void setBuilding(boolean building) {
        this.building = building;
    }

    // Геттер для флага дополнительных линий обслуживания.
    public boolean isServiceLines() {
        return serviceLines;
    }

    // Сеттер для флага дополнительных линий обслуживания.
    public void setServiceLines(boolean serviceLines) {
        this.serviceLines = serviceLines;
    }

    // Геттер для флага завершения.
    public boolean isFinish() {
        return finish;
    }

    // Сеттер для флага завершения.
    public void setFinish(boolean finish) {
        this.finish = finish;
    }

    // Метод YN возвращает "Да" или "Нет" в зависимости от значения boolean.
    public String YN(boolean r) {
        return r ? "Да" : "Нет";
    }

    // Переопределенный метод toString() возвращает информацию о состоянии документации.
    @Override
    public String toString() {
        StringBuilder sb = new StringBuilder();
        sb.append("Базовая документация : ").append(YN(isBase())).append('\n')
          .append("Строительство : ").append(YN(isBuilding())).append('\n')
          .append("Дополнительные линии обслуживания : ").append(YN(isServiceLines())).append('\n')
          .append("Завершено : ").append(YN(isFinish())).append('\n');
        return sb.toString();
    }
}
