<?php

// Определение интерфейса Multiplyable (возможность умножения)
interface Multiplyable{
    public function multiple();
}

// Определение интерфейса Transportable (возможность перемещения)
interface Transportable{
    public function moveTo();
}

// Определение интерфейса Destroyable (возможность уничтожения)
interface Destroyable{
    public function destroy();
}

// Определение интерфейса LiveUnit (возможность выполнения действия)
interface LiveUnit{
    public function makeAction();
}

// Класс Animal реализует интерфейсы LiveUnit, Transportable, Destroyable
class Animal implements LiveUnit, Transportable, Destroyable{
    public function moveTo(){} // Реализация метода для перемещения
    public function destroy(){} // Реализация метода для уничтожения
    public function makeAction(){} // Реализация метода для выполнения действия
}

// Класс Wall реализует интерфейс Destroyable
class Wall implements Destroyable{
    public function destroy(){} // Реализация метода для уничтожения
}

// Класс Stone реализует интерфейсы Transportable и Destroyable
class Stone implements Transportable, Destroyable{
    public function moveTo(){} // Реализация метода для перемещения
    public function destroy(){} // Реализация метода для уничтожения
}

// Класс Seaweed реализует интерфейсы Transportable, Destroyable, Multiplyable
class Seaweed implements Transportable, Destroyable, Multiplyable{
    public function moveTo(){} // Реализация метода для перемещения
    public function destroy(){} // Реализация метода для уничтожения
    public function multiple(){} // Реализация метода для умножения
}
