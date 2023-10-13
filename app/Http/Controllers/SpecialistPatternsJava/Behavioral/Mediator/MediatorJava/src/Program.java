import controllers.WinController;
import static tests.User.verifyButton;

public class Program {

	public static void main(String[] args) {
		
		new WinController().generateWindow().draw();
		
		verifyButton.press(); // иммитация нажатия

	}

}
