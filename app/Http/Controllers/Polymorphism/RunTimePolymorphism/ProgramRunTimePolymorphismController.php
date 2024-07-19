<?php

namespace App\Http\Controllers\Polymorphism\RunTimePolymorphism;

/**
 * Полиморфизм времени выполнения (Run-Time Polymorphism)
 */
class ProgramRunTimePolymorphismController
{
    /**
     * В этом примере у нас есть базовый класс Animal с методом makeSound(). Затем у нас есть два производных класса:
     * Dog и Cat, каждый из которых переопределяет метод makeSound(). Функция animalMakeSound() принимает объект типа
     * Animal и вызывает его метод makeSound().
     *
     * При создании объектов $animal1 и $animal2 тип объектов определяется на основе их фактического класса. При вызове
     * функции animalMakeSound() происходит динамическое связывание, и вызывается соответствующий метод для каждого
     * объекта в зависимости от его реального типа.
     *
     * Этот пример демонстрирует, как полиморфизм времени выполнения позволяет использовать объекты производных классов
     * так, будто они являются объектами базового класса.
     *
     */
    public function index()
    {
        // Функция, принимающая объект типа Animal
        function animalMakeSound(Animal $animal)
        {
            $animal->makeSound();
        }

        // Создание объектов и вызов методов
        $animal1 = new Dog();
        $animal2 = new Cat();

        animalMakeSound($animal1);
        animalMakeSound($animal2);
    }
}



