import java.util.Locale;

import factories.*;

// Класс Program является точкой входа в программу.
public class Program {

    public static void main(String[] args) {
        HouseFactory factory;
        // Проверяем страну в текущей локали
        if (Locale.getDefault().getCountry().equals("RU")) {
            // Если страна - Россия, создаем фабрику для строительства каменных домов
            factory = new StoneHouseFactory();
        } else {
            // В противном случае создаем фабрику для строительства деревянных домов
            factory = new WoodHouseFactory();
        }

        // Создаем стены дома и строим их
        factory.createWall().build();

        // Создаем крышу дома, покрываем её и обеспечиваем защиту от воды
        factory.createRoof().cover().waterProtect();

        // Создаем окно, устанавливаем его и открываем
        factory.createWindow().install().open();
    }
}
