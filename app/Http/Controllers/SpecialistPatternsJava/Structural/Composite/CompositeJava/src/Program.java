import widgets.*;

public class Program {

	public static void main(String[] args) {
		
		// можно использовать Builder для создания дерева объектов
		CompositeControl mainWin = new MainWindow();
		CompositeControl frame1 = new CompositeControl();
		CompositeControl frame2 = new CompositeControl();
		frame1.add(new Label("Login")).add(new Button("OK"));
		frame2.add(new Label("Password")).add(new Button("Verify"));
		mainWin.add(frame1).add(frame2).
				add(new CompositeControl().add(new Button("Print")));
		
		// отрисовка окна
		mainWin.draw();
		
		

	}

}
