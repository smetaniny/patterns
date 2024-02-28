<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\Observer;
use Illuminate\Support\Collection;

abstract class Subject
{
    protected $observers;

    public function __construct()
    {
        $this->observers = new Collection();
    }

    public function attach(Observer $observer)
    {
        $this->observers->push($observer);
    }

    public function detach(Observer $observer)
    {
        $this->observers = $this->observers->reject(function ($item) use ($observer) {
            return $item === $observer;
        });
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}
