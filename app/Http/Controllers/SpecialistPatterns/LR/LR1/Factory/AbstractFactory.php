<?php

namespace App\Http\Controllers\SpecialistPatterns\LR\LR1\Factory;

use App\Http\Controllers\SpecialistPatterns\LR\LR1\GraphObjects\GraphObject;
use App\Http\Controllers\SpecialistPatterns\LR\LR1\Scenes\Scene;

abstract class AbstractFactory
{
    abstract public function createScene(): Scene;
    abstract public function createGraphObject(array $params): GraphObject;
}
