package exports;

import graph.Circle;
import graph.Point;

public interface ExportVisitor {
	void exportPoint(Point p);
	void exportCircle(Circle c);

}
