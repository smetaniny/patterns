
public class Program {

	public static void main(String[] args) {
		PriceBuilder priceBuilder = new PriceBuilder();
		HouseBuilder houseBuilder = new HouseBuilder();
		DocBuilder docBuilder = new DocBuilder();
		
		Director salesman = new Director(priceBuilder); // �������
		Director manager = new Director(docBuilder); // ��������
		Director foreman = new Director(houseBuilder); // ������
		
		salesman.make(true);
		int price = priceBuilder.getResult();
		System.out.printf("�������� ������ �������� - ����: %d\n\n", price);
		
		foreman.make(true);
		House house = houseBuilder.getResult();
		System.out.printf("�������� ������ ������� - ���:\n%s\n", house);
		
		manager.make(true);
		Documentation doc = docBuilder.getResult();
		System.out.printf("�������� ������ ��������� - ����� ����������:\n%s\n", doc);
		

	}

}
