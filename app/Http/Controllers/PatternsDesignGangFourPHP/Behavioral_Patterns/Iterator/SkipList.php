<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\Iterator;

class SkipList extends ListClass
{
    public function createIterator(): Iterator
    {
        return new SkipListIterator($this);
    }
}
