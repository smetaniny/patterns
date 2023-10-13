package states;

import documents.Document;

public class ApprovedState extends State {

	public ApprovedState(Document doc) {
		super(doc);
	}

	@Override
	public String toString() {
		return "Approved";
	}

}
