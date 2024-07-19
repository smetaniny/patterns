package logic;

public class LogicFactory {
	private LogicFactory() {}
	public static final LogicFactory instance = new LogicFactory();
	
	public Verifier createVerifier() {
		return new Verifier();
	}
	
}
