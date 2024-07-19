package widgets;

import controllers.Mediator;

public abstract class UIComponent {
	public abstract boolean draw(int line);
	public abstract int getHeight();
	public abstract int getWidth();
	
	private Mediator controller;
	
	public Mediator getController() {
		return controller;
	}
	public void setController(Mediator controller) {
		this.controller = controller;
	}

	private boolean visible = true;

	public boolean isVisible() {
		return visible;
	}
	public void setVisible(boolean visible) {
		this.visible = visible;
	}
	

}
