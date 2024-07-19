#include <iostream>
#include "Singleton1.h"
#include "Singleton2.h"

using namespace std;

int main(int argc, char** argv) {
	{
		Singleton1* s1 = Singleton1::Instance();
		Singleton1* s2 = Singleton1::Instance();
		cout << s1 << endl << s2 << endl;
	}
	{
		Singleton2* s1 = Singleton2::Instance();
		Singleton2* s2 = Singleton2::Instance();
		cout << s1 << endl << s2 << endl;
	}
	
	
	return 0;
}
