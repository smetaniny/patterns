import strategies.Strategy;

public class Context {
	private Strategy strategy;
	private int[] data;
	
	public Context(int... data) {
		this.data = data;
	}

	public Context setStrategy(Strategy strategy) {
		this.strategy = strategy;
		return this;
	}
	
	public void execute() {
		System.out.println(this.strategy.getResult(data));
	}
	
	

}
