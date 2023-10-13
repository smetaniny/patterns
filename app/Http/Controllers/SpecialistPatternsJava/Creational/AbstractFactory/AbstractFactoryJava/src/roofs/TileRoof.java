package roofs;

import static java.lang.System.out;

public class TileRoof implements Roof {

	@Override
	public Roof cover() {
		out.println("Покрыли крышу из черепицы");
		return this;
	}

	@Override
	public void waterProtect() {
		out.println("Сделали гидроизоляцию черепичной крыши");
	}

}
