package iterator;

import java.util.Stack;

import widgets.CompositeControl;
import widgets.UIComponent;

// итератор всего дерева включая композиты
public class CompositeControlIterator implements UIIterator {

	private CompositeControl source;
	protected Stack<UIComponent> composites;
	private int uiIndex;
	
	protected void fillComposites(CompositeControl parent) {
		composites.push(parent);
		for(UIComponent c : parent.getChildren())
			if (c instanceof CompositeControl)
				fillComposites((CompositeControl)c);
			else
				composites.push(c);
				
	}
	
	public CompositeControlIterator(CompositeControl source) {
		this.source = source;
	}
	
	private void lazyInit() {
		if (composites == null) {
			composites = new Stack<UIComponent>();
			fillComposites(source);
			uiIndex = 0;

		}
	}
	
	@Override
	public UIComponent getNext() {
		if ( hasMore() )
			return composites.get(uiIndex++);
		else
			return null;
	}

	@Override
	public boolean hasMore() {
		lazyInit();
		return uiIndex < composites.size();
		
	}

}
