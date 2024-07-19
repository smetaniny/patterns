<?php

namespace App\Http\Controllers\Polymorphism\RunTimePolymorphism;

/**
 * Производный класс
 */
class Dog extends Animal
{
    public function makeSound()
    {
        echo "Гав! Гав!<br />";
    }
}
