package nature;

import java.util.Random;

public class AnimalFactory {
	protected Random r = new Random();
	public Animal createButterfly() {
		return new Animal(r.nextInt(), r.nextInt(), "../Images/butterfly.png");
	}
	public Animal createLadybug() {
		return new Animal(r.nextInt(), r.nextInt(),"../Images/ladybug.png");
	}
	public Animal createSnail() {
		return new Animal(r.nextInt(), r.nextInt(),"../Images/snail.png");
	}
	

}
