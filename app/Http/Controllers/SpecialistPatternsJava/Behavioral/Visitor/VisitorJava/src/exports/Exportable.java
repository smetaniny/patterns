package exports;

public interface Exportable {
	void accept(ExportVisitor v);
}
