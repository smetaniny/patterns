package graph;

import java.util.ArrayList;
import java.util.Iterator;
import java.util.List;

import exports.ExportVisitor;
import exports.Exportable;
import exports.JSONExportVisitor;

public class Scene {
	private List<GraphObject> objects ;
	public static final Scene instance = new Scene();
	
	private Scene() {
		objects = new ArrayList<GraphObject>();
	}
	
	public void add(GraphObject o) {
		objects.add(o);
	} 
	
	public void clear() {
		objects.clear();
	}
	
	public void draw() {
		for(GraphObject g : objects)
			g.draw();
	}
	
	public void exportToJSON() {
		ExportVisitor visitor = new JSONExportVisitor();
		Iterator<GraphObject> iter = objects.iterator();
		System.out.print('[');
		while (iter.hasNext()) {
			GraphObject g = iter.next();
			if (g instanceof Exportable) {
				((Exportable)g).accept(visitor);
				if (iter.hasNext()) System.out.println(',');
			}
		}
		System.out.println(']');
	}
	

}
