package walls;

// Класс BrickWall представляет стену из кирпича.
public class BrickWall implements Wall {

    // Метод build() выполняет построение стены из кирпича.
    @Override
    public void build() {
        System.out.println("Постройка стены из кирпича");
    }
}
