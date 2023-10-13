package states;

import documents.Document;

public class DraftState extends State {

	public DraftState(Document doc) {
		super(doc);
	}

	@Override
	public void verify() {
		if (this.doc.getSumma() > 0)
			doc.changeState(new ReviewState(doc));
	}

	@Override
	public String toString() {
		return "Draft";
	}
	
	@Override
	public void onEnterState(State oldState) {
		//super.onEnterState(oldState);
		if (this.doc.getSumma() > 0)
			this.verify();
			
	}

}
