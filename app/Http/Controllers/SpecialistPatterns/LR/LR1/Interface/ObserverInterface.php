<?php

namespace App\Http\Controllers\SpecialistPatterns\LR\LR1\Interface;

use App\Http\Controllers\SpecialistPatterns\LR\LR1\GraphObjects\GraphObject;

interface ObserverInterface
{
    public function update(GraphObject $object);
}
