#include "Singleton1.h"

Singleton1* Singleton1::_instance = 0;
Singleton1* Singleton1::Instance() {
  if(_instance == 0){
     _instance = new Singleton1;
  }
  return _instance;
}
