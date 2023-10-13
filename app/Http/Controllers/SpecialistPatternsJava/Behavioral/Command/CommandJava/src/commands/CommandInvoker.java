package commands;

public interface CommandInvoker {
	void setCommand(Command command);
	void executeCommand();
}
