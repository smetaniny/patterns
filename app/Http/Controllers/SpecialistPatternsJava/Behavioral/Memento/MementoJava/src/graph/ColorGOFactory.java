package graph;

public class ColorGOFactory extends AbstractGOFactory {
	public static final Point DEFAULT_POINT = new Point(0,0); 	
	
	@Override
	public Point createPoint() {
		Point p = DEFAULT_POINT.clone();
		Scene.instance.add(p); // hook
		return p;
	}

}
