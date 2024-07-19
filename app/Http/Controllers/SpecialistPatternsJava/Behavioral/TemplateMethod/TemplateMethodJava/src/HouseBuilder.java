import static java.lang.System.out;

public class HouseBuilder {
	
	public void buildeHouse() {
		doBasement();
		doWalls();
		doRoof();
		doWindows();
		doDoors();
		doAdditions();
	} 
	
	protected void doBasement() {
		out.println("��������� ���������");
	}
	protected void doWalls() {
		out.println("�������� �����");
	}
	protected void doRoof() {
		out.println("������� �����");
	}
	protected void doWindows() {
		out.println("�������� ����");
	}
	protected void doDoors() {
		out.println("���������� �����");
	}
	protected void doAdditions() {
	}

}
