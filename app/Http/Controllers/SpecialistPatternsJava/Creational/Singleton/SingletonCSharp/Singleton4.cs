using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace SingletonCSharp
{
    public class Singleton4
    {
        private static readonly Lazy<Singleton4> lazy =
            new Lazy<Singleton4>(() => new Singleton4());

        public static Singleton4 Instance { get { return lazy.Value; } }

        private Singleton4()
        {
            Console.WriteLine("Singleton 4 created");
        }
    }
}
