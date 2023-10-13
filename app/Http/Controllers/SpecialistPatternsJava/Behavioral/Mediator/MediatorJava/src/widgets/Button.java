package widgets;
import static java.lang.System.out;

public class Button extends ContentControl {
	final static char BUTTON_FRAME = '*';

	public Button() {
		super();
	}
	
	public Button(String text) {
		super(text);
	}
	
	private void printBorder() {
		for(int i = 0; i < getText().length(); i++)
			out.print(BUTTON_FRAME);
	}
	@Override
	public boolean draw(int line) {
		if (!isVisible()) return false;
		if (line == 0 || line == 2) {
			out.print(BUTTON_FRAME);
			printBorder();
			out.print(BUTTON_FRAME);
			return true;
		}
		if (line == 1) {
			out.print(BUTTON_FRAME);
			out.print(getText());
			out.print(BUTTON_FRAME);
			return true;
		}
		return false;
	}

	public void press() {
		System.out.printf("Button %s pressed\n", getText());
		getController().notify(this, getText());
	}

	@Override
	public int getHeight() {
		return 3;
	}

}
