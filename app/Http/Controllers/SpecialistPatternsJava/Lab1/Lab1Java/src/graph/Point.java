package graph;

public class Point extends GraphObject {
	private Coords coords;
	
	public Point(int x, int y) {
		this(x,y,DEFAULT_COLOR);
	}
	public Point(int x, int y, String color) {
		super(color);
		coords = new Coords(x,y);
	}
	
	public Point(Point p) {
		this(p.getX(),p.getY(),p.getColor());
	}

	public int getX() {
		return coords.getX();
	}

	public void setX(int x) {
		coords.setX(x);
	}

	public int getY() {
		return coords.getY();
	}

	public void setY(int y) {
		coords.setY(y);
	}
	
	@Override
	public Point clone() {
		return new Point(this);
	}
	
	@Override
	public void draw() {
		System.out.printf("Point (%d, %d) %s\n", getX(), getY(), getColor());
		
	}

}
