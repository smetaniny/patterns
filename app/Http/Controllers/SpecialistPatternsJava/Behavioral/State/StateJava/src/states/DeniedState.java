package states;

import documents.Document;

public class DeniedState extends State{

	public DeniedState(Document doc) {
		super(doc);
	}


	@Override
	public String toString() {
		return "Denied";
	}

}
