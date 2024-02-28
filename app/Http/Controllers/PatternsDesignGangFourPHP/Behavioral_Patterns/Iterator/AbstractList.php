<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\Iterator;

abstract class AbstractList
{
    abstract public function createIterator(): Iterator;
}
