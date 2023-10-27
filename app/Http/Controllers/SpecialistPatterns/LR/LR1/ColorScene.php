<?php

namespace App\Http\Controllers\SpecialistPatterns\LR\LR1;

class ColorScene extends Scene
{
    // Переопределите методы для отображения объектов в цветном режиме
    public function render()
    {
        echo "Отображение цветной сцены:<br />";
        foreach ($this->objects as $object) {
            $object->drawColor();
        }
    }
}
