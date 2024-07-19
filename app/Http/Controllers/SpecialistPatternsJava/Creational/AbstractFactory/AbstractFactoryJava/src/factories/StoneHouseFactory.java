package factories;

import roofs.Roof;
import roofs.TileRoof;
import walls.BrickWall;
import walls.Wall;
import windows.PlasticFrameWindow;
import windows.Window;

// StoneHouseFactory - конкретная фабрика для создания компонентов каменных домов.
public class StoneHouseFactory implements HouseFactory {

	// Метод создания стены, возвращает каменную стену.
	@Override
	public Wall createWall() {
		return new BrickWall();
	}

	// Метод создания крыши, возвращает крышу с керамической черепицей.
	@Override
	public Roof createRoof() {
		return new TileRoof();
	}

	// Метод создания окна, возвращает окно с пластиковой рамой.
	@Override
	public Window createWindow() {
		return new PlasticFrameWindow();
	}
}
