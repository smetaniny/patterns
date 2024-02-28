<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\Iterator;


class PrintNEmployees extends ListTraverser
{
    private $total;
    private $count;

    public function __construct($aList, int $n)
    {
        parent::__construct($aList);
        $this->total = $n;
        $this->count = 0;
    }

    protected function processItem($e)
    {
        $this->count++;
        $e->printInfo();
        return $this->count < $this->total;
    }
}
