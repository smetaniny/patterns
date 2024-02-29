<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\Iterator;

interface Iterator {
    public function first();
    public function next();
    public function isDone(): bool;
    public function currentItem();
}
