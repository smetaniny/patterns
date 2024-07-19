#ifndef __SINGLETON_2__
#define __SINGLETON_2__

#include <iostream>
using namespace std;

// static vars
// + thread safe since C++11
// + lazy init
class Singleton2
{
public:
   static Singleton2* Instance() {
      static Singleton2 inst;
      return &inst;
   }
private:
  Singleton2() {
  	cout << "Singleton 2 created" << endl;
  }
  ~Singleton2() {}
  Singleton2(const Singleton2&)= delete;                 // Prevent copy-construction
  Singleton2& operator=(const Singleton2&) = delete;     // Prevent assignment  
};

#endif
