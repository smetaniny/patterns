import graph.AbstractGOFactory;
import graph.ColorGOFactory;
import graph.Scene;

public class Program {

	public static void main(String[] args) {
		AbstractGOFactory gof = new ColorGOFactory();
		gof.createPoint().setColor("red");
		gof.createPoint().setColor("green");
		
		gof.createCircle().setColor("blue");
		
		Scene.instance.draw();
		Scene.instance.exportToJSON();
		

	}

}
