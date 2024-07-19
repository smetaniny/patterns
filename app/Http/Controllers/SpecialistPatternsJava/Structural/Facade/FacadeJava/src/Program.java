import facades.AppCreatorFacade;
import facades.SimpleAppCreatorFacade;

public class Program {

	public static void main(String[] args) {
		
		AppCreatorFacade facade = new SimpleAppCreatorFacade();
		facade.showApp("Login", "@OK", "Password", "@Verify");

	}

}
