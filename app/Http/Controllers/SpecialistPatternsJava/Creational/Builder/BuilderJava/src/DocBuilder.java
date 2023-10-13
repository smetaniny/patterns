import static java.lang.System.out;

public class DocBuilder implements Builder {


	private Documentation doc;
	
	@Override
	public void reset() {
		doc = new Documentation();
	}

	@Override
	public void perpare() {
		out.println("��������� ���������� �� ������������� ");
		doc.setBase(true);
	}

	@Override
	public void mainWork() {
		out.println("���������� �����");
		doc.setBuilding(true);
	}

	@Override
	public void addServiceLines() {
		out.println("��������� �� ����������� ������������");
		doc.setServiceLines(true);

	}

	@Override
	public void finsish() {
		out.println("��� ����� � ������������");
		doc.setFinish(true);
	}
	
	public Documentation getResult() {
		return doc;
	}
}
