<?php

namespace App\Http\Controllers\SpecialistPatterns\LR\LR1;

use App\Http\Controllers\SpecialistPatterns\LR\LR1\Builder\MemoryCalculatorBuilder;
use App\Http\Controllers\SpecialistPatterns\LR\LR1\Builder\SceneBuilder;
use App\Http\Controllers\SpecialistPatterns\LR\LR1\Builder\TestSceneBuilder;
use App\Http\Controllers\SpecialistPatterns\LR\LR1\Factory\BlackAndWhiteFactory;
use App\Http\Controllers\SpecialistPatterns\LR\LR1\Factory\ColorFactory;

class ProgramLR1
{
    public function index()
    {
        // Создайте сцену с использованием SceneBuilder
        $sceneBuilder = new SceneBuilder();
        $scene = $sceneBuilder
            ->addPoint(1, 2)
            ->addLine(3, 4, 5, 6)
            ->addCircle(7, 8, 9)
            ->buildScene();

        // Рассчитайте занимаемую память сцены с использованием MemoryCalculatorBuilder
        $memoryCalculatorBuilder = new MemoryCalculatorBuilder($scene);
        $memoryCalculatorBuilder->calculateMemoryUsage();

        $testSceneBuilder = new TestSceneBuilder();
        $testScene = $testSceneBuilder->buildTestScene();
    }
}
