package graph;

import java.util.ArrayList;
import java.util.List;

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
	public void setColor(String color) {
		for(GraphObject g : objects)
			g.setColor(color);
	}
	
	public SceneSnapshot save() {
		return new SceneSnapshot(this);
	}
	
	public void restore(SceneSnapshot snapshot) {
		objects = snapshot.getState();
	}
	
	public static class SceneSnapshot {
		private List<GraphObject> state;
		
		private SceneSnapshot(Scene scene) {
			state = new ArrayList<>();
			for(GraphObject g : scene.objects)
				state.add(g.clone());
		}
		
		private List<GraphObject> getState() {
			List<GraphObject>restoredState = new ArrayList<>();
			for(GraphObject g : state)
				restoredState.add(g.clone());
			return restoredState;
		}
		
		public int size() {
			return state.size();
		}
	}
	

}
