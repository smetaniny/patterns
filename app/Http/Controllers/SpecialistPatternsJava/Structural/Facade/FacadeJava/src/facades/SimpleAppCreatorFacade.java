package facades;
import widgets.Button;
import widgets.ContentControl;
import widgets.Label;
import widgets.MainWindow;

public class SimpleAppCreatorFacade extends AppCreatorFacade {
	private MainWindow mainWin; 
	
	@Override
	public MainWindow showApp(String... comp) {
		this.mainWin = new MainWindow();
		for(String title : comp) {
			ContentControl c;
			if (title.startsWith("@"))
				c = new Button(title.substring(1));
			else
				c = new Label(title);
			mainWin.add(c);
		}
		
		mainWin.draw();
		return mainWin;
		
	}

	@Override
	public MainWindow getMainWindow() {
		return mainWin;
	}

}
