<?php

namespace App\Http\Controllers\Polymorphism\RunTimePolymorphism;

/**
 * Базовый класс
 */
class Animal
{
    public function makeSound()
    {
        echo "Some generic sound\n";
    }
}
