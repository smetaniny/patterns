package ui;
import static java.lang.System.out;

import platforms.Database;

public class UserInterface {
	private Database db;
	
	public UserInterface(Database db) {
		this.db = db;
	} 
	
	public void login(String userName) {
		if (db.hasUser(userName))
			out.printf("User %s logged in as %s\n", userName, getRole());
		
	}
	
	public void drawInterface() {
		db.queryData();
		out.println("Data for simple user");
		
	}
	
	public String getRole() {
		return "SimpleUser";
	}
	

}
