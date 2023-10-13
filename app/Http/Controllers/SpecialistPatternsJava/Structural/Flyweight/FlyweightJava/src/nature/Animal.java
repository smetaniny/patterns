package nature;

import java.io.FileInputStream;
import java.io.IOException;

public class Animal {
	
	private int x, y;
	
	private byte[] picture;
	
	public Animal(int x, int y) {
		this.x = x;
		this.y = y;
	}
	
	public Animal(int x, int y, String fileName) {
		this(x,y);
		//FileInputStream fs;
		try (FileInputStream fs = new FileInputStream(fileName)){
			//fs = new FileInputStream(fileName);
			picture = new byte[fs.available()];
			fs.read(picture);
		} catch (IOException e) {
			e.printStackTrace();
		}
		
		
	}
	
	public void move(int dx, int dy){
		x += dx;
		y += dy;
	}
	
	public int getX() {
		return x;
	}

	public int getY() {
		return y;
	}
	
	// draw animal sprite from this.picture in (x, y) position
	public void draw() {
		System.out.printf("Animal sprite in (%d,%d) \n", getX(), getY());
	}
}
