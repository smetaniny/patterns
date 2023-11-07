package nature.flyweight;

import java.io.FileInputStream;
import java.io.IOException;

// Класс для изображения животных (FlyWeight)
public class AnimalPicture {
    private byte[] picture;

    // Конструктор класса AnimalPicture с указанием пути к изображению
    public AnimalPicture(String fileName) {
        try (FileInputStream fs = new FileInputStream(fileName)){
            picture = new byte[fs.available()];
            fs.read(picture);
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    // Метод для отрисовки спрайта животного по координатам (x, y)
    public void draw(int x, int y) {
        System.out.printf("Спрайт животного в (%d,%d) <br />", x, y);
    }
}
