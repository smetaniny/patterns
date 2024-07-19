package factories;

import roofs.Roof;
import roofs.WoodRoof;
import walls.Wall;
import walls.WoodWall;
import windows.Window;
import windows.WoodFrameWindow;

// WoodHouseFactory - конкретная фабрика для создания компонентов деревянных домов.
public class WoodHouseFactory implements HouseFactory {

    // Метод создания стены, возвращает деревянную стену.
    @Override
    public Wall createWall() {
        return new WoodWall();
    }

    // Метод создания крыши, возвращает крышу с деревянной отделкой.
    @Override
    public Roof createRoof() {
        return new WoodRoof();
    }

    // Метод создания окна, возвращает окно с деревянной рамой.
    @Override
    public Window createWindow() {
        return new WoodFrameWindow();
    }
}
