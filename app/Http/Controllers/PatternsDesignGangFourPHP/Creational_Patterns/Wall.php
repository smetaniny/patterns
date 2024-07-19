<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Creational_Patterns;

class Wall extends \App\Http\Controllers\PatternsDesignGangFourPHP\Creational_Patterns\MapSite
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
