// Импортируем необходимые классы из пакета graph
import graph.AbstractGOFactory;
import graph.ColorGOFactory;
import graph.Scene;

public class Program {
    public static void main(String[] args) {
        // Создаем экземпляр абстрактной фабрики ColorGOFactory
        AbstractGOFactory gof = new ColorGOFactory();

        // Создаем две точки с разными цветами и добавляем их на сцену
        gof.createPoint().setColor("red");
        gof.createPoint().setColor("green");

        // Создаем окружность с цветом "blue" и добавляем ее на сцену
        gof.createCircle().setColor("blue");

        // Вызываем метод отрисовки сцены для отображения всех добавленных объектов
        Scene.instance.draw();
    }
}

