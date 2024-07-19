package facades;
import widgets.MainWindow;

public abstract class AppCreatorFacade {
	public abstract MainWindow getMainWindow();
	public abstract MainWindow showApp(String... comp);

}
