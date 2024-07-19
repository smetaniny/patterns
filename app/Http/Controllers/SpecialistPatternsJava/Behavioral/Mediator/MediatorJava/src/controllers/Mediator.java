package controllers;

import widgets.UIComponent;

public interface Mediator {
	void notify(UIComponent sender, String event);

}
