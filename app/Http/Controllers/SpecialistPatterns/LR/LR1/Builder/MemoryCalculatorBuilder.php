<?php

namespace App\Http\Controllers\SpecialistPatterns\LR\LR1\Builder;

use App\Http\Controllers\SpecialistPatterns\LR\LR1\Scenes\Scene;

class MemoryCalculatorBuilder
{
    private Scene $scene;

    public function __construct(Scene $scene)
    {
        $this->scene = $scene;
    }

    public function calculateMemoryUsage()
    {
        // Рассчитайте занимаемую память сцены и её объектов здесь
        $memoryUsage = memory_get_usage();
        echo $memoryUsage . "<br />";
    }
}
