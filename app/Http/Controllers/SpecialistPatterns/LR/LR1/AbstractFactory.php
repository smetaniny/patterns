<?php

namespace App\Http\Controllers\SpecialistPatterns\LR\LR1;

abstract class AbstractFactory
{
    abstract public function createScene(): Scene;
    abstract public function createGraphObject(array $params): GraphObject;
}
