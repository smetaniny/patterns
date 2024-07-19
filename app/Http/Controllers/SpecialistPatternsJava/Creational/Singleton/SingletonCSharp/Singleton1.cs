using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace SingletonCSharp
{
    // double checked lock
    // + thread safe
    // - perfomance (due to lock)
    public class Singleton1
    {
        private static volatile Singleton1 instance;
        private static object syncRoot = new Object();

        private Singleton1() {
            Console.WriteLine("Singleton 1 created");
        }

        public static Singleton1 Instance
        {
            get
            {
                if (instance == null)
                {
                    lock (syncRoot)
                    {
                        if (instance == null)
                            instance = new Singleton1();
                    }
                }
                return instance;
            }
        }
    }
}
