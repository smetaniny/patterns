<?php

namespace App\Http\Controllers\SpecialistPatterns\LR\LR1;

use App\Http\Controllers\SpecialistPatterns\LR\LR1\Builder\MemoryCalculatorBuilder;
use App\Http\Controllers\SpecialistPatterns\LR\LR1\Builder\SceneBuilder;
use App\Http\Controllers\SpecialistPatterns\LR\LR1\Builder\TestSceneBuilder;
use App\Http\Controllers\SpecialistPatterns\LR\LR1\Factory\BlackAndWhiteFactory;
use App\Http\Controllers\SpecialistPatterns\LR\LR1\Factory\ColorFactory;

/**
 *Создаем сцену с использованием SceneBuilder, добавляет на нее точку, линию и окружность,
 * затем рассчитывает занимаемую память сцены с использованием MemoryCalculatorBuilder.
 * Кроме того, он создает тестовую сцену с использованием TestSceneBuilder.
 */
class ProgramLR1
{
    public function index()
    {
        // Создаем сцену с использованием SceneBuilder
        $sceneBuilder = new SceneBuilder();
        $scene = $sceneBuilder
            ->addPoint(1, 2)
            ->addLine(3, 4, 5, 6)
            ->addCircle(7, 8, 9)
            ->buildScene();

        // Рассчитываем занимаемую память сцены с использованием MemoryCalculatorBuilder
        $memoryCalculatorBuilder = new MemoryCalculatorBuilder($scene);
        $memoryCalculatorBuilder->calculateMemoryUsage();

        // Создаем тестовую сцену с использованием TestSceneBuilder
        $testSceneBuilder = new TestSceneBuilder();
        $testScene = $testSceneBuilder->buildTestScene();
    }
}
