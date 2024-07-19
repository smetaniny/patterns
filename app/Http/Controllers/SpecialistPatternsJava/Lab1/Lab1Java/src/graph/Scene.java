package graph;

import java.util.ArrayList;
import java.util.List;

// Класс Scene представляет собой сцену для отображения графических объектов.
public class Scene {
    private List<GraphObject> objects; // Список объектов, отображаемых на сцене.
    public static final Scene instance = new Scene(); // Статический экземпляр сцены для доступа.

    // Приватный конструктор сцены, инициализирующий список объектов.
    private Scene() {
        objects = new ArrayList<GraphObject>();
    }

    // Метод для добавления объекта на сцену.
    public void add(GraphObject o) {
        objects.add(o);
    }

    // Метод для очистки сцены от всех объектов.
    public void clear() {
        objects.clear();
    }

    // Метод для отрисовки всех объектов на сцене.
    public void draw() {
        for (GraphObject g : objects) {
            g.draw();
        }
    }
}
