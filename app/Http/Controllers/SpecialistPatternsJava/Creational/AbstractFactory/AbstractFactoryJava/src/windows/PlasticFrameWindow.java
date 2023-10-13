package windows;
import static java.lang.System.out;

public class PlasticFrameWindow implements Window {

	@Override
	public void open() {
		out.println("Открыли пластиковое окно");

	}

	@Override
	public void close() {
		out.println("Закрыли пластиковое окно");
	}

	@Override
	public Window install() {
		out.println("Установили пластиковое окно");
		return this;
	}

}
