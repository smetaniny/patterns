using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace SingletonCSharp
{
    // Microsoft
    // + thread safe (readonly field init on first call)
    // - no static  methods
    public sealed class Singleton2
    {
        private static readonly Singleton2 instance = new Singleton2();

        // Explicit static constructor to tell C# compiler
        // not to mark type as beforefieldinit
        static Singleton2()
        {
        }

        private Singleton2()
        {
            Console.WriteLine("Singleton 2 created");
        }

        public static Singleton2 Instance
        {
            get
            {
                return instance;
            }
        }
    }
}
