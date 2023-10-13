import java.util.ArrayList;
import java.util.List;

import windows.MetalFrameWindow;
import windows.Window;

public class Program {
	
	static List<Window> windows = new ArrayList<Window>();

	public static void main(String[] args) {
		Supplier[] creators = new Supplier[] {
				new Supplier(), new CompanyA(), new CompanyB(),
				new GenericSupplier(MetalFrameWindow.class)};

		for(Supplier c : creators)
			c.install().open();
		
		System.out.println("������������� ����:");
		for(Window w : windows)
			System.out.println(w);
	}

}
