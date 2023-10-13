package nature.flyweight;

import java.io.FileInputStream;
import java.io.IOException;

// Это и есть Легковес (FlyWeight)
public class AnimalPicture {
	private byte[] picture;
	
	public AnimalPicture(String fileName) {
		try (FileInputStream fs = new FileInputStream(fileName)){
			picture = new byte[fs.available()];
			fs.read(picture);
		} catch (IOException e) {
			e.printStackTrace();
		}
	}
	
	// draw animal sprite from this.picture in (x, y) position
	public void draw(int x, int y) {
		System.out.printf("Animal sprite in (%d,%d) \n", x, y);
	}
	

}
