package events;

public class EventRequest {
	private boolean handled = false;

	public boolean isHandled() {
		return handled;
	}

	public void setHandled(boolean handled) {
		this.handled = handled;
	}
}
