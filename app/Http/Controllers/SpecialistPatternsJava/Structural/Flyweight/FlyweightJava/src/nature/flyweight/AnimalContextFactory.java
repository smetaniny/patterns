package nature.flyweight;

import nature.Animal;
import nature.AnimalFactory;

public class AnimalContextFactory extends AnimalFactory {

    // Переопределение метода для создания бабочки
    @Override
    public Animal createButterfly() {
        return new AnimalContext(r.nextInt(), r.nextInt(), AnimalType.butterfly);
    }

    // Переопределение метода для создания божьей коровки
    @Override
    public Animal createLadybug() {
        return new AnimalContext(r.nextInt(), r.nextInt(), AnimalType.ladybug);
    }

    // Переопределение метода для создания улитки
    @Override
    public Animal createSnail() {
        return new AnimalContext(r.nextInt(), r.nextInt(), AnimalType.snail);
    }
}
