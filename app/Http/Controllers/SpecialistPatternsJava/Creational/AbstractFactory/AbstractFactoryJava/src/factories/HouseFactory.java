package factories;

import roofs.Roof;
import walls.Wall;
import windows.Window;

// Интерфейс HouseFactory определяет контракт для фабрик, создающих компоненты дома.
public interface HouseFactory {
    // Метод для создания стены дома.
    Wall createWall();

    // Метод для создания крыши дома.
    Roof createRoof();

    // Метод для создания окна дома.
    Window createWindow();
}
