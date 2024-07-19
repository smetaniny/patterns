package states;

import documents.Document;

public class ReviewState extends State {

	public ReviewState(Document doc) {
		super(doc);
	}

	@Override
	public void approve() {
		if (doc.getSumma() <= 2000)
			doc.changeState(new ApprovedState(doc));
	}

	@Override
	public void deny() {
		if (doc.getSumma() > 2000)
			doc.changeState(new DeniedState(doc));
		
	}
	
	@Override
	public String toString() {
		return "On review";
	}

	@Override
	public void onEnterState(State oldState) {
		super.onEnterState(oldState);
		if (this.doc.getSumma() > 2000)
			this.deny();
		else
			this.approve();
			
	}
}
