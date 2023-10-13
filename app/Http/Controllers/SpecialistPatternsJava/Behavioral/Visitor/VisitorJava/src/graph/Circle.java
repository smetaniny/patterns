package graph;

import exports.ExportVisitor;

public class Circle extends GraphObject {
	private Coords center;
	private int r;
	
	public Circle(int x, int y, int r) {
		this(x,y,r,DEFAULT_COLOR);
	}
	public Circle(int x, int y, int r, String color) {
		super(color);
		center = new Coords(x,y);
		this.r = r;
		
	}
	
	public Circle(Circle c) {
		this(c.getX(),c.getY(),c.getR(), c.getColor());
	}
	public int getR() {
		return r;
	}
	
	public void setR(int r) {
		this.r = r;
	}
	
	
	public int getX() {
		return center.getX();
	}

	public void setX(int x) {
		center.setX(x);
	}

	public int getY() {
		return center.getY();
	}

	public void setY(int y) {
		center.setY(y);
	}
	
	@Override
	public Circle clone() {
		return new Circle(this);
	}
	
	@Override
	public void draw() {
		System.out.printf("Circle (%d, %d) R: %d %s\n", getX(), getY(), getR(), getColor());
		
	}
	@Override
	public void accept(ExportVisitor v) {
		v.exportCircle(this);
	}
	
	

}
