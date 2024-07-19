package nature.flyweight;

import nature.Animal;

public class AnimalContext extends Animal {
    private AnimalPicture flyweight;

    // Конструктор класса AnimalContext с координатами x, y и типом животного
    public AnimalContext(int x, int y, AnimalType type) {
        super(x, y);
        this.flyweight = AnimalPictureFactory.instance.getAnimalPicture(type);
    }

    // Переопределенный метод для отрисовки животного
    @Override
    public void draw() {
        flyweight.draw(getX(), getY());
    }
}
