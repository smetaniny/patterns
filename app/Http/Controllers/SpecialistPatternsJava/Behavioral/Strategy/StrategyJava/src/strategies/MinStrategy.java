package strategies;

public class MinStrategy implements Strategy{

	@Override
	public int getResult(int[] data) {
		int min = 0;
		if (data.length > 0) min = data[0];
		for(int k : data)
			if (k < min) min = k;
		
		return min;
	}

}
