import static java.lang.System.out;

public class HouseBuilder implements Builder {

	private House house;
	
	@Override
	public void reset() {
		house = new House();
	}

	@Override
	public void perpare() {
		out.println("Подготовка фундамента");
		house.setBase(true);
	}

	@Override
	public void mainWork() {
		out.println("Возведение дома");
		house.setBuilding(true);
	}

	@Override
	public void addServiceLines() {
		out.println("Подключение коммуникаций");
		house.setServiceLines(true);

	}

	@Override
	public void finsish() {
		out.println("Отделка");
		house.setFinish(true);
	}
	
	public House getResult() {
		return house;
	}
	

}
