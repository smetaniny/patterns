package nature.flyweight;

import nature.Animal;
import nature.AnimalFactory;

public class AnimalContextFactory extends AnimalFactory {
	@Override
	public Animal createButterfly() {
		return new AnimalContext(r.nextInt(), r.nextInt(), AnimalType.butterfly);
	}
	@Override
	public Animal createLadybug() {
		return new AnimalContext(r.nextInt(), r.nextInt(),AnimalType.ladybug);
	}
	@Override
	public Animal createSnail() {
		return new AnimalContext(r.nextInt(), r.nextInt(),AnimalType.snail);
	}

}
