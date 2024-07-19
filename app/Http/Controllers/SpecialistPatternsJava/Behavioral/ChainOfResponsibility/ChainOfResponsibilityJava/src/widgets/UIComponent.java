package widgets;

import events.EventRequest;
import events.Handler;

// ����� ����� ��c������ � ���� BaseHandler
public abstract class UIComponent implements Handler{

	private Handler nextHandler;

	public abstract boolean draw(int line);
	public abstract int getHeight();
	public abstract int getWidth();

	@Override
	public void setNextHandler(Handler next) {
		nextHandler = next;
	}

	@Override
	public void handle(EventRequest request) {
		if (request.isHandled()) return;
		System.out.printf("Handle event in %s<br />", this);
		if (nextHandler != null)
			nextHandler.handle(request);

	}

}
