package nature;

import java.util.Random;

public class AnimalFactory {
    protected Random r = new Random(); // Генератор случайных чисел

    // Метод для создания экземпляра бабочки
    public Animal createButterfly() {
        return new Animal(r.nextInt(), r.nextInt(), "../Images/butterfly.png");
    }

    // Метод для создания экземпляра божьей коровки
    public Animal createLadybug() {
        return new Animal(r.nextInt(), r.nextInt(),"../Images/ladybug.png");
    }

    // Метод для создания экземпляра улитки
    public Animal createSnail() {
        return new Animal(r.nextInt(), r.nextInt(),"../Images/snail.png");
    }
}
