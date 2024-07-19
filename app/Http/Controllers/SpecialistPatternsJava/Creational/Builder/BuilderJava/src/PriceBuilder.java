public class PriceBuilder implements Builder {

    private int total;

    // Сброс текущей общей стоимости
    @Override
    public void reset() {
        total = 0;
    }

    // Добавление стоимости подготовительных работ
    @Override
    public void perpare() {
        total += 500;
    }

    // Добавление стоимости основных строительных работ
    @Override
    public void mainWork() {
        total += 1500;
    }

    // Добавление стоимости инженерных коммуникаций
    @Override
    public void addServiceLines() {
        total += 300;
    }

    // Добавление стоимости завершающих работ
    @Override
    public void finsish() {
        total += 400;
    }

    // Получение общей стоимости
    public int getResult() {
        return total;
    }
}
