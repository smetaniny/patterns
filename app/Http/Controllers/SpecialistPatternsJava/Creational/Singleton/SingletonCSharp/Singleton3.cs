using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace SingletonCSharp
{
    // Nested class
    public sealed class Singleton3
    {
        private Singleton3()
        {
            Console.WriteLine("Singleton 3 created");
        }

        public static Singleton3 Instance { get { return NestedContainer.instance; } }

        private class NestedContainer
        {
            // Explicit static constructor to tell C# compiler
            // not to mark type as beforefieldinit
            static NestedContainer()
            {
            }

            internal static readonly Singleton3 instance = new Singleton3();
        }
    }
}
