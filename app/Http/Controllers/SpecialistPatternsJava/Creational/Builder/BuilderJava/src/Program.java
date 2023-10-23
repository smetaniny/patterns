public class Program {


    public static void main(String[] args) {
        /**
        * Создание экземпляров строителей для разных видов конструкций
        */
        // Строитель для подсчёта стоимости
        PriceBuilder priceBuilder = new PriceBuilder();
         // Строитель для строительства дома
        HouseBuilder houseBuilder = new HouseBuilder();
        // Строитель для документации
        DocBuilder docBuilder = new DocBuilder();

        /**
        * Создание директоров для разных видов строительства
        */
        // Директор продаж
        Director salesman = new Director(priceBuilder);
        Director manager = new Director(docBuilder); // Директор управления документацией
        Director foreman = new Director(houseBuilder); // Директор стройки

        // Директор продаж заказывает строительство и получает стоимость
        salesman.make(true);
        int price = priceBuilder.getResult();
        System.out.printf("Итоговая стоимость строительства - %d\n\n", price);

        // Директор стройки заказывает строительство и получает дом
        foreman.make(true);
        House house = houseBuilder.getResult();
        System.out.printf("Итоговый результат строительства - дом:\n%s\n", house);

        // Директор управления документацией заказывает документацию и получает документ
        manager.make(true);
        Documentation doc = docBuilder.getResult();
        System.out.printf("Итоговый результат управления документацией - документ:\n%s\n", doc);
    }
}
