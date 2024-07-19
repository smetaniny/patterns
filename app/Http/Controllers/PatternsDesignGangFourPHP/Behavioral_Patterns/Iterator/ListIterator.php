<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\Iterator;

class ListIterator implements Iterator {
    private $list;
    private $current;

    public function __construct(AbstractList $aList) {
        $this->list = $aList;
        $this->current = 0;
    }

    public function first() {
        $this->current = 0;
    }

    public function next() {
        $this->current++;
    }

    public function isDone(): bool {
        return $this->current >= $this->list->count();
    }

    public function currentItem() {
        if ($this->isDone()) {
            return null;
        }
        return $this->list->get($this->current);
    }
}
