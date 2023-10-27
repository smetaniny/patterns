<?php

namespace App\Http\Controllers\SpecialistPatterns\LR\LR1;


class BlackAndWhiteScene extends Scene
{
    // Переопределите методы для отображения объектов в черно-белом режиме
    public function render()
    {
        echo "Отображение черно-белой сцены:<br />";
        foreach ($this->objects as $object) {
            $object->drawBlackAndWhite();
        }
    }
}
