package controllers;

import widgets.Button;
import widgets.CompositeControl;
import widgets.Label;
import widgets.MainWindow;
import widgets.UIComponent;

public class WinController implements Mediator {
	private CompositeControl mainWin;
	private Button printButton; 
	
	public CompositeControl generateWindow()
	{
		mainWin = new MainWindow();
		CompositeControl frame1 = new CompositeControl();
		CompositeControl frame2 = new CompositeControl();
		
		frame1.add(new Label("Login")).add(new Button("OK"));
		
		tests.User.verifyButton = new Button("Verify"); // только для иммитации нажатия
		frame2.add(new Label("Password")).add(tests.User.verifyButton);
		
		printButton = new Button("Print");
		printButton.setVisible(false);
		
		mainWin.add(frame1).add(frame2).
				add(new CompositeControl().add(printButton));
		
		mainWin.setController(this);
		
		return mainWin;
	}

	@Override
	public void notify(UIComponent sender, String event) {
		if (event.equals("Verify")) {
			printButton.setVisible(true);
			mainWin.draw();
		}
		
	}

}
