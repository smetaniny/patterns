import nature.AnimalFactory;
import nature.flyweight.AnimalContextFactory;


public class Program {

    // Метод для отображения использования памяти
    static void showMemoryUsage() {
        Runtime rt = Runtime.getRuntime();
        long usedMB = (rt.totalMemory() - rt.freeMemory()) / 1024 / 1024;
        System.out.printf("Использование памяти: %dMB<br />" ,usedMB);
    }

    // Метод для создания экземпляров животных с использованием фабрики
    static void createNatue(AnimalFactory factory) {
        for(int i=0; i < 10000; i++) {
            factory.createButterfly();  // Создание бабочки
            factory.createLadybug();    // Создание божьей коровки
            factory.createSnail();       // Создание улитки
        }
    }

    public static void main(String[] args) {
        System.gc(); // Вызов сборщика мусора
        System.out.print("Без использования Flyweight "); // Вывод сообщения о том, что используется без Flyweight
        createNatue(new AnimalFactory()); // Создание животных без использования Flyweight
        showMemoryUsage(); // Отображение использования памяти

        System.gc(); // Вызов сборщика мусора
        System.out.print("С использованием Flyweight "); // Вывод сообщения о том, что используется с Flyweight
        createNatue(new AnimalContextFactory()); // Создание животных с использованием Flyweight
        showMemoryUsage(); // Отображение использования памяти
    }
}
