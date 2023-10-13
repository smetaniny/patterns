package nature.flyweight;

import java.util.HashMap;
import java.util.Map;

public class AnimalPictureFactory {
	
	Map<AnimalType, AnimalPicture> cache;
	private AnimalPictureFactory() {
		cache = new HashMap<AnimalType, AnimalPicture>();
	}
	
	public static final AnimalPictureFactory instance = 
			new AnimalPictureFactory();
	
	public AnimalPicture getAnimalPicture(AnimalType type)
	{
		if (cache.containsKey(type))
			return cache.get(type);
		else {
			AnimalPicture pic = new AnimalPicture("../Images/"+type.name()+".png");
			cache.put(type, pic);
			return pic;
		}
	}
}
