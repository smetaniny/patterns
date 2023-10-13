package logic;

public class PrintSpooler {
	private PrintSpooler () {}
	public static final PrintSpooler instance = new PrintSpooler();
	
	public void print(String printer, String data) {
		System.out.printf("Printing to %s : %s\n", printer, data);
		
	}

}
