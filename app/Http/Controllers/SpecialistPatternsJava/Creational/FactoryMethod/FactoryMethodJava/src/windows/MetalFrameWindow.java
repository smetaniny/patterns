package windows;

public class MetalFrameWindow  implements Window {
	@Override
	public void open() {
		System.out.println("Открыли металлическое окно");
	}
	
	@Override
	public String toString() {
		return "Металлическое окно";
	}
}
