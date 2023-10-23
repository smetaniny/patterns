package walls;

// Класс WoodWall представляет стену из дерева.
public class WoodWall implements Wall {

    // Метод build() выполняет построение стены из дерева.
    @Override
    public void build() {
        System.out.println("Постройка стены из дерева");
    }
}
