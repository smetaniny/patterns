package windows;
import static java.lang.System.out;


public class WoodFrameWindow implements Window {

	@Override
	public void open() {
		out.println("������� ���������� ����");

	}

	@Override
	public void close() {
		out.println("������� ���������� ����");
	}

	@Override
	public Window install() {
		out.println("���������� ���������� ����");
		return this;
	}

}
