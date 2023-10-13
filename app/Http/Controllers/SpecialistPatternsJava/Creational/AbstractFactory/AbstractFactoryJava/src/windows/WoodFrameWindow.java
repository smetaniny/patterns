package windows;
import static java.lang.System.out;


public class WoodFrameWindow implements Window {

	@Override
	public void open() {
		out.println("Открыли деревянное окно");

	}

	@Override
	public void close() {
		out.println("Закрыли деревянное окно");
	}

	@Override
	public Window install() {
		out.println("Установили деревянное окно");
		return this;
	}

}
