using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace SingletonCSharp
{
    class Program
    {
        static void Main(string[] args)
        {
            {
                Singleton1 s1 = Singleton1.Instance;
                Singleton1 s2 = Singleton1.Instance;
                Console.WriteLine(s1.GetHashCode());
                Console.WriteLine(s2.GetHashCode());
            }
            {
                Singleton2 s1 = Singleton2.Instance;
                Singleton2 s2 = Singleton2.Instance;
                Console.WriteLine(s1.GetHashCode());
                Console.WriteLine(s2.GetHashCode());
            }
            {
                Singleton3 s1 = Singleton3.Instance;
                Singleton3 s2 = Singleton3.Instance;
                Console.WriteLine(s1.GetHashCode());
                Console.WriteLine(s2.GetHashCode());
            }
            {
                Singleton4 s1 = Singleton4.Instance;
                Singleton4 s2 = Singleton4.Instance;
                Console.WriteLine(s1.GetHashCode());
                Console.WriteLine(s2.GetHashCode());
            }
            {
                Singleton5 s1 = Singleton5.Instance;
                Singleton5 s2 = Singleton5.Instance;
                Console.WriteLine(s1.GetHashCode());
                Console.WriteLine(s2.GetHashCode());
            }
        }
    }
}
