#ifndef __SINGLETON_1__
#define __SINGLETON_1__

#include <iostream>
using namespace std;

// - non thread-safe
class Singleton1
{
public:
   static Singleton1* Instance();
protected:
   Singleton1() {
		cout << "Singleton 1 created" << endl;
   }
   
private:
   static Singleton1* _instance;
};
#endif
