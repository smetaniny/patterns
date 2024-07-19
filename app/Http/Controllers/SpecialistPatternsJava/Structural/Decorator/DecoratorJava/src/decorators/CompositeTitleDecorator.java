package decorators;

import static java.lang.System.out;

import widgets.CompositeControl;

public class CompositeTitleDecorator extends CompositeBaseDecorator {

	private String title;
	
	public CompositeTitleDecorator(CompositeControl wrappee) {
		this(wrappee, null);
	}
	public CompositeTitleDecorator(CompositeControl wrappee, String title) {
		super(wrappee);
		this.title = title;
	}
	
	@Override
	public boolean draw(int line) {
		if (line == 0 && title != null && title.length() > 0) {
			out.print(COMPOSITE_FRAME);
			out.print(getTitle());
			for(int i = 0; i < getWidth()-getTitle().length()-2; i++)
				out.print(COMPOSITE_FRAME);
			drawLineFinish();
			return true;
		}
		return wrappee.draw(line);
	}
	
	@Override
	public void drawLineFinish() {
		this.wrappee.drawLineFinish();
	}
	
	public String getTitle() {
		return title;
	}
	public void setTitle(String title) {
		this.title = title;
	}
	
	
	
	
}
