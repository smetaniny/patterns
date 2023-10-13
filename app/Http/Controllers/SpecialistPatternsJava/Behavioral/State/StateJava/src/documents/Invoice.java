package documents;

import states.DraftState;

public class Invoice extends Document{
	
	private int summa;
	private String contragent;
	
	
	public Invoice(int summa, String contragent) {
		this.summa = summa;
		this.contragent = contragent;
		changeState(new DraftState(this));
		
	}

	@Override
	public int getSumma() {
		return summa;
	}

	public String getContragent() {
		return contragent;
	}
	
	@Override
	public String toString() {
		return String.format("%-20s : %6d  : %s", 
				getContragent(), getSumma(), getState());
	}

}
