<?php

namespace App\Http\Controllers\SpecialistPatterns\LR\LR1\Builder;

use App\Http\Controllers\SpecialistPatterns\LR\LR1\GraphObjects\Circle;
use App\Http\Controllers\SpecialistPatterns\LR\LR1\GraphObjects\Line;
use App\Http\Controllers\SpecialistPatterns\LR\LR1\GraphObjects\Point;
use App\Http\Controllers\SpecialistPatterns\LR\LR1\Scenes\Scene;
use JetBrains\PhpStorm\Pure;

class SceneBuilder
{
    private Scene $scene;

    #[Pure] public function __construct()
    {
        $this->scene = new Scene();
    }

    public function addPoint(int $x, int $y): static
    {
        $point = Point::createAndAddToScene($this->scene, $x, $y);
        return $this;
    }

    public function addLine(int $x1, int $y1, int $x2, int $y2)
    {
        $line = Line::createAndAddToScene($this->scene, $x1, $y1, $x2, $y2);
        return $this;
    }

    public function addCircle(int $x, int $y, int $radius)
    {
        $circle = Circle::createAndAddToScene($this->scene, $x, $y, $radius);
        return $this;
    }

    public function buildScene()
    {
        return $this->scene;
    }
}
