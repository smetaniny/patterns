package states;

import documents.Document;

public abstract class State {
	
	protected Document doc;
	
	public State(Document doc) {
		this.doc = doc;
	}
	
	public void onEnterState(State oldState) {
		System.out.printf("%s -> %s\n", oldState, this);
	}
	
	// actions
	public void verify() {}
	public void approve() {}
	public void deny() {}
}
