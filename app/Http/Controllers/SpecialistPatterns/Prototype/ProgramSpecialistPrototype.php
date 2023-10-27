<?php

namespace app\Http\Controllers\SpecialistPatterns\Prototype;

class ProgramSpecialistPrototype
{
    public function index()
    {
        // Создаем прототипы точек
        $protos = [
            'default' => new ColorPoint(10, 10, 'black'),
            'red' => new ColorPoint(20, 20, 'red'),
            'green' => new ColorPoint(30, 30, 'green')
        ];

        // Создаем точку на основе прототипа по умолчанию
        $defaultPoint = $protos['default']->clone();
        echo $defaultPoint . "<br/>";

        // Создаем красную точку на основе прототипа "red"
        $redPoint = $protos['red']->clone();
        echo $redPoint . "<br/>";
    }
}
