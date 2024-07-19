
// + Thread safe
// - no laze init (Объект instance будет создан classloader-ом во время инициализации класса) 
// - no parameters
// - no try catch
public class Singleton2 {
	private Singleton2() {
		System.out.println("Singleton 2 created");
	}
	
	private static Singleton2 instance = new Singleton2();
	
	public static Singleton2 getInstance() {
		return instance;
	}
}
