package strategies;

public class MaxStrategy implements Strategy{

	@Override
	public int getResult(int[] data) {
		int max = 0;
		if (data.length > 0) max = data[0];
		for(int k : data)
			if (k > max) max = k;
		
		return max;
	}
	

}
