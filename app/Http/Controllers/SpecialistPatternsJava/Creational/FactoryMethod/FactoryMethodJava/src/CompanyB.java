import windows.Window;
import windows.WoodFrameWindow;

public class CompanyB extends Supplier {
	@Override
	public Window createWindow() {
		return new WoodFrameWindow();
	}

}
