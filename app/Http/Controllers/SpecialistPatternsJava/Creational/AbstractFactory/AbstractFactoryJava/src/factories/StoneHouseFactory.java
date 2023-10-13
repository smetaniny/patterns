package factories;
import roofs.Roof;
import roofs.TileRoof;
import walls.BrickWall;
import walls.Wall;
import windows.PlasticFrameWindow;
import windows.Window;

public class StoneHouseFactory implements HouseFactory {

	@Override
	public Wall createWall() {
		return new BrickWall();
	}

	@Override
	public Roof createRoof() {
		return new TileRoof();
	}

	@Override
	public Window createWindow() {
		return new PlasticFrameWindow();
	}

}
