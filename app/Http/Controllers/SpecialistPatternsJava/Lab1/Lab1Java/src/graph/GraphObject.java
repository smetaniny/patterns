package graph;

public abstract class GraphObject implements Cloneable{
	
	public static final String DEFAULT_COLOR = "black";
	private String color;
	
	public GraphObject() {
		this(DEFAULT_COLOR);
	}
	public GraphObject(String color) {
		super();
		this.color = color;
	}


	public String getColor() {
		return color;
	}

	public void setColor(String color) {
		this.color = color;
	}

	public abstract void draw();

}
