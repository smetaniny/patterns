package factories;
import roofs.Roof;
import roofs.WoodRoof;
import walls.Wall;
import walls.WoodWall;
import windows.Window;
import windows.WoodFrameWindow;

public class WoodHouseFactory implements HouseFactory {

	@Override
	public Wall createWall() {
		return new WoodWall();
	}

	@Override
	public Roof createRoof() {
		return new WoodRoof();
	}

	@Override
	public Window createWindow() {
		return new WoodFrameWindow();
	}

}
