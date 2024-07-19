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
        // Продавец
        Director salesman = new Director(priceBuilder);
         // Прораб
        Director foreman = new Director(houseBuilder);
         // Менеджер
        Director manager = new Director(docBuilder);

        // Директор продаж заказывает строительство и получает стоимость
        salesman.make(true);
        int price = priceBuilder.getResult();
        System.out.printf("Результат работы продавца - цена %d<br /><br />", price);

        // Директор стройки заказывает строительство и получает дом
        foreman.make(true);
        House house = houseBuilder.getResult();
        System.out.printf("Результат работы прораба - дом:<br />%s<br />", house);

        // Директор управления документацией заказывает документацию и получает документ
        manager.make(true);
        Documentation doc = docBuilder.getResult();
        System.out.printf("Результат работы менеджера - документ:<br />%s<br />", doc);
    }
}
