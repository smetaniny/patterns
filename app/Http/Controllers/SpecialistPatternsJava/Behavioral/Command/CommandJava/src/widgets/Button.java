package widgets;
import static java.lang.System.out;

import commands.Command;
import commands.CommandInvoker;

public class Button extends ContentControl implements CommandInvoker {
	final static char BUTTON_FRAME = '*';

	private Command pressCommand;
	
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
		executeCommand();
	}

	@Override
	public int getHeight() {
		return 3;
	}

	@Override
	public void setCommand(Command command) {
		pressCommand = command;
		
	}

	@Override
	public void executeCommand() {
		if (pressCommand != null)
			pressCommand.execute();
		
	}

}
