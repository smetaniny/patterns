<?php

namespace App\Http\Controllers\Polymorphism\RunTimePolymorphism;

/**
 * Производный класс
 */
class Cat extends Animal
{
    public function makeSound()
    {
        echo "Мяу!<br />";
    }
}
