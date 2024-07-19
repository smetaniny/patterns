import commands.PrintCommand;
import commands.VerifyCommand;
import widgets.*;

public class Program {

	public static void main(String[] args) {
		
		CompositeControl mainWin = new MainWindow();
		CompositeControl frame1 = new CompositeControl();
		CompositeControl frame2 = new CompositeControl();
		frame1.add(new Label("Login")).add(new Button("OK"));
		
		Button verifyButton = new Button("Verify");
		verifyButton.setCommand(new VerifyCommand());
		
		frame2.add(new Label("Password")).add(verifyButton);
		
		Button printButton = new Button("Print");
		printButton.setCommand(new PrintCommand("Epson", frame1));
		
		
		mainWin.add(frame1).add(frame2).add(new CompositeControl().add(printButton));
		
		// отрисовка окна
		mainWin.draw();
		
		verifyButton.press(); // команда Verify
		printButton.press();  // команда Print
		
		
		
		

	}

}
