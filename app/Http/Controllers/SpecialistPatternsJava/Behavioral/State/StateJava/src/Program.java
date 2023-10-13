import documents.Invoice;

public class Program {

	public static void main(String[] args) {
		Invoice inv1 = new Invoice(500, "Рога");
		System.out.println(inv1);

		Invoice inv2 = new Invoice(2500, "Копыта");
		System.out.println(inv2);

		Invoice inv3 = new Invoice(0, "Рога&Копыта");
		System.out.println(inv3);
	}

}
