package strategies;

import java.util.Random;

public class RandomStrategy implements Strategy{
	Random rnd = new Random();
	
	@Override
	public int getResult(int[] data) {
		if (data.length == 0) return 0;
		return data[rnd.nextInt(data.length)];
	}

}
