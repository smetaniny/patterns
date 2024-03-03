<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Creational_Patterns\Abstract_Factory;

class Wall
{
    public function __construct()
    {
        // Конструктор не требует дополнительной реализации
    }

    public function Clone(): Wall
    {
        return new Wall();
    }

    public function Enter(): void
    {
        // Реализация метода Enter
    }
}

?>
