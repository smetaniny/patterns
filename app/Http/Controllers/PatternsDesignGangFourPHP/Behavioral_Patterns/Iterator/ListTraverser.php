<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\Iterator;


abstract class ListTraverser
{
    protected $iterator;

    public function __construct($aList)
    {
        $this->iterator = new ListIterator($aList);
    }

    public function traverse()
    {
        $result = false;

        for ($this->iterator->first(); !$this->iterator->isDone(); $this->iterator->next()) {
            $result = $this->processItem($this->iterator->currentItem());

            if ($result === false) {
                break;
            }
        }

        return $result;
    }

    abstract protected function processItem($item);
}
