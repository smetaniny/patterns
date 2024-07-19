package commands;

import logic.LogicFactory;

// команда без параметров
public class VerifyCommand extends Command{

	@Override
	public void execute() {
		LogicFactory.instance.createVerifier().verify();
	}

}
