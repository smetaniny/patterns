import static java.lang.System.out;

public class HouseBuilder implements Builder {

	private House house;
	
	@Override
	public void reset() {
		house = new House();
	}

	@Override
	public void perpare() {
		out.println("���������� ����������");
		house.setBase(true);
	}

	@Override
	public void mainWork() {
		out.println("���������� ����");
		house.setBuilding(true);
	}

	@Override
	public void addServiceLines() {
		out.println("����������� ������������");
		house.setServiceLines(true);

	}

	@Override
	public void finsish() {
		out.println("�������");
		house.setFinish(true);
	}
	
	public House getResult() {
		return house;
	}
	

}
