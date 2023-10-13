package commands;

import logic.LogicFactory;

// ������� ��� ����������
public class VerifyCommand extends Command{

	@Override
	public void execute() {
		LogicFactory.instance.createVerifier().verify();
	}

}
