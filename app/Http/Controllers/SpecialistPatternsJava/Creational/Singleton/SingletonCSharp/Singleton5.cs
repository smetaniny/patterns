using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading;
using System.Threading.Tasks;

namespace SingletonCSharp
{
    // Jeffrey Richter
    // + faster then lock (avoid try finally)

    public sealed class Singleton5
    {
        private static readonly Object s_lock = new Object();
        private static Singleton5 instance = null;

        private Singleton5()
        {
            Console.WriteLine("Singleton 5 created");
        }

        public static Singleton5 Instance
        {
            get
            {
                if (instance != null) return instance;
                Monitor.Enter(s_lock);
                Singleton5 temp = new Singleton5();
                Interlocked.Exchange(ref instance, temp);
                Monitor.Exit(s_lock);
                return instance;
            }
        }
    }
}
