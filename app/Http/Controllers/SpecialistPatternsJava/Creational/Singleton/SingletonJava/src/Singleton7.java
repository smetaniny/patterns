
// + thread safe
// + switch support
// - no lazy init
// - no try catch for ctor
public enum Singleton7 {
	instance("abc");
	
	private Singleton7(String a) {
		data = a;
		System.out.println("Singleton 7 created");
	}
	
	String data;
	public void someMethod() {
		System.out.println(data);
	}
}
