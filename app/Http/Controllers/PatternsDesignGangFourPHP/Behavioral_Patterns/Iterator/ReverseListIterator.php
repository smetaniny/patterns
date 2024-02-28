<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\Iterator;


class ReverseListIterator
{
    private $list;
    private $current;

    public function __construct($aList)
    {
        $this->list = $aList;
        $this->current = $this->list->count() - 1;
    }

    public function first()
    {
        $this->current = $this->list->count() - 1;
    }

    public function next()
    {
        $this->current--;
    }

    public function isDone()
    {
        return $this->current < 0;
    }

    public function currentItem()
    {
        if ($this->isDone()) {
            // Возможно, нужно обработать исключение IteratorOutOfBounds;
            // но здесь я просто возвращаю null в случае выхода за пределы списка
            return null;
        }
        return $this->list->get($this->current);
    }
}
