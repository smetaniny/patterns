package graph;

public class Coords implements Cloneable {
	private int x,y;

	public Coords(int x, int y) {
		super();
		this.x = x;
		this.y = y;
	}
	public Coords(Coords c) {
		this(c.getX(), c.getY());
	}

	public int getX() {
		return x;
	}

	public void setX(int x) {
		this.x = x;
	}

	public int getY() {
		return y;
	}

	public void setY(int y) {
		this.y = y;
	}
	
	@Override
	protected Object clone() {
		return new Coords(this);
	}
	
	

}
