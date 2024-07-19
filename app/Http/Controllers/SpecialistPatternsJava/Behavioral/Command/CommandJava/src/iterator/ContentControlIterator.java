package iterator;

import widgets.CompositeControl;
import widgets.ContentControl;
import widgets.UIComponent;

// итератор только для ContentControl
public class ContentControlIterator extends CompositeControlIterator {

	public ContentControlIterator(CompositeControl source) {
		super(source);
	}
	protected void fillComposites(CompositeControl parent) {
		//composites.push(parent);
		for(UIComponent c : parent.getChildren())
			if (c instanceof CompositeControl)
				fillComposites((CompositeControl)c);
			else if (c instanceof ContentControl)
				composites.push(c);
				
	}
	
	// переопределили для преобразования типа к ContentControl
	@Override
	public ContentControl getNext() {
		return (ContentControl)super.getNext();
	}

}
