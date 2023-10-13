import iterator.ContentControlIterator;
import iterator.UIIterator;
import widgets.*;

public class Program {

	public static void main(String[] args) {
		
		// создаём дерево
		CompositeControl mainWin = new MainWindow();
		CompositeControl frame1 = new CompositeControl();
		CompositeControl frame2 = new CompositeControl();
		frame1.add(new Label("Login")).add(new Button("OK"));
		frame2.add(new Label("Password")).add(new Button("Verify"));
		mainWin.add(frame1).add(frame2).
				add(new CompositeControl().add(new Button("Print")));
		
		//mainWin.draw();
		
		// итератор всего дерева включая композиты
		UIIterator iter = mainWin.getIterator();
		while(iter.hasMore()) {
			System.out.println(iter.getNext());
		}
			
		// итератор только для ContentControl
		ContentControlIterator iterContent = mainWin.getContentIterator();
		while(iterContent.hasMore()) {
			System.out.println(iterContent.getNext().getText());
		}
		
		
		
		

	}

}
