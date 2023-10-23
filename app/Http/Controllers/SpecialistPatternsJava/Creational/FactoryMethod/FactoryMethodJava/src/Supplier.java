import windows.Window;

public class Supplier {
	public Window createWindow() {
		return new Window() {
			@Override
			public String toString() {
				return "����";
			}
			@Override
			public void open() {
				System.out.println("������� ����");
			}
		};
	}

	// hook
	protected void onInstall(Window window)
	{
		Program.windows.add(window);
	}

	public Window install()
	{
		Window window = createWindow();
		System.out.printf("����������� %s\n", window);
		onInstall(window); // hook
		return window;
	}
}
