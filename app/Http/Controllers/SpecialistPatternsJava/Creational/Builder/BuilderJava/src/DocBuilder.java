import static java.lang.System.out;

public class DocBuilder implements Builder {


	private Documentation doc;
	
	@Override
	public void reset() {
		doc = new Documentation();
	}

	@Override
	public void perpare() {
		out.println("Получение разрешения на строительство ");
		doc.setBase(true);
	}

	@Override
	public void mainWork() {
		out.println("Подготовка сметы");
		doc.setBuilding(true);
	}

	@Override
	public void addServiceLines() {
		out.println("Документы на подключение коммуникаций");
		doc.setServiceLines(true);

	}

	@Override
	public void finsish() {
		out.println("Акт ввода в эксплуатацию");
		doc.setFinish(true);
	}
	
	public Documentation getResult() {
		return doc;
	}
}
