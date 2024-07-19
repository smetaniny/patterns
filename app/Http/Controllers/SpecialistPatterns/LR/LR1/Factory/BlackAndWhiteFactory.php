<?php

namespace App\Http\Controllers\SpecialistPatterns\LR\LR1\Factory;

use App\Http\Controllers\SpecialistPatterns\LR\LR1\GraphObjects\Circle;
use App\Http\Controllers\SpecialistPatterns\LR\LR1\GraphObjects\GraphObject;
use App\Http\Controllers\SpecialistPatterns\LR\LR1\GraphObjects\Line;
use App\Http\Controllers\SpecialistPatterns\LR\LR1\GraphObjects\Point;
use App\Http\Controllers\SpecialistPatterns\LR\LR1\Scenes\BlackAndWhiteScene;
use App\Http\Controllers\SpecialistPatterns\LR\LR1\Scenes\Scene;
use JetBrains\PhpStorm\Pure;

class BlackAndWhiteFactory extends AbstractFactory
{
    #[Pure] public function createScene(): Scene
    {
        return new BlackAndWhiteScene();
    }

    public function createGraphObject(array $params): GraphObject
    {
        $type = $params['type'];
        $scene = $params['scene'];

        if ($type === 'point') {
            $x = $params['x'];
            $y = $params['y'];
            return Point::createAndAddToScene($scene, $x, $y);
        } elseif ($type === 'line') {
            $x1 = $params['x1'];
            $y1 = $params['y1'];
            $x2 = $params['x2'];
            $y2 = $params['y2'];
            return Line::createAndAddToScene($scene, $x1, $y1, $x2, $y2);
        } elseif ($type === 'circle') {
            $x = $params['x'];
            $y = $params['y'];
            $radius = $params['radius'];
            return Circle::createAndAddToScene($scene, $x, $y, $radius);
        }
    }
}
