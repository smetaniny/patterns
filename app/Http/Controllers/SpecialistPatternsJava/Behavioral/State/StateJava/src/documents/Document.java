package documents;

import states.State;

public abstract class Document {
	private State state;
	
	public abstract int getSumma();
	
	public State getState() {
		return state;
	}

	public void changeState(State newState) {
		State oldState = this.state;
		this.state = newState;
		this.state.onEnterState(oldState);
	}
	
	public void verify() {
		state.verify();
	}

	public void approve() {
		state.approve();
	}

	public void deny() {
		state.deny();
	}
	

}
