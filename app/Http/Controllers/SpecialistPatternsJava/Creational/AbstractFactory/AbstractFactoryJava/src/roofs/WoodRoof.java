package roofs;

import static java.lang.System.out;

public class WoodRoof implements Roof{

	@Override
	public Roof cover() {
		out.println("Покрыли деревянную крышу");
		return this;
	}

	@Override
	public void waterProtect() {
		out.println("Сделали гидроизоляцию деревянной крыши");
		
	}

}
