package nature;

import java.io.FileInputStream;
import java.io.IOException;

public class Animal {

    private int x, y;
    private byte[] picture;

    // Конструктор класса Animal с координатами x и y
    public Animal(int x, int y) {
        this.x = x;
        this.y = y;
    }

    // Конструктор класса Animal с координатами x, y и путем к изображению
    public Animal(int x, int y, String fileName) {
        this(x, y);
        try (FileInputStream fs = new FileInputStream(fileName)) {
            picture = new byte[fs.available()];
            fs.read(picture);
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    // Метод для перемещения животного на указанное расстояние (dx, dy)
    public void move(int dx, int dy) {
        x += dx;
        y += dy;
    }

    // Геттер для получения координаты x
    public int getX() {
        return x;
    }

    // Геттер для получения координаты y
    public int getY() {
        return y;
    }

    // Метод для отрисовки спрайта животного в позиции (x, y)
    public void draw() {
        System.out.printf("Спрайт животного в (%d, %d) <br />", getX(), getY());
    }
}
