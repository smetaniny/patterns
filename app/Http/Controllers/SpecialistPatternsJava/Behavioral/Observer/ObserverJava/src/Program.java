

public class Program
{
	public static void main(String[] args)
	{
		
		Switcher sw = new Switcher();
		Lamp lamp = new Lamp();
		TVSet tv = new TVSet();
		AirCondition ac  =new AirCondition();
		
		sw.addElectricityListener(lamp);
		sw.addElectricityListener(tv);
		
		sw.addElectricityListener(
				new ElectricityListener() {
					public void electricityOn(Object source)
					{
						System.out.println("Пожар");
					}
				}
			);
		
		//sw.addElectricityListener(s-> System.out.println("Fire"));
		//sw.addElectricityListener( s -> ac.cool(s) );
		sw.addElectricityListener( ac::cool );
		
		sw.switchOn();
				

	}

}
