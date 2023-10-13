import windows.PlasticFrameWindow;
import windows.Window;

public class CompanyA extends Supplier {
	@Override
	public Window createWindow() {
		return new PlasticFrameWindow();
	}
}
