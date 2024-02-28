<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\Iterator;


class SkipListIterator extends ListIterator
{
    public function __construct(ListClass $aList)
    {
        parent::__construct($aList);
    }
}
