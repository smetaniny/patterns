package factories;
import roofs.Roof;
import walls.Wall;
import windows.Window;

public interface HouseFactory {
	Wall createWall();
	Roof createRoof();
	Window createWindow();
}
