<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\Iterator;

class IteratorPtr
{
    private $i;

    public function __construct(Iterator $i)
    {
        $this->i = $i;
    }

    public function __destruct()
    {
        unset($this->i); // Удаление объекта Iterator при уничтожении экземпляра IteratorPtr
    }

    public function getIterator()
    {
        return $this->i;
    }

    public function __call($method, $arguments)
    {
        // Перенаправление всех вызовов методов объекта Iterator к соответствующему методу
        // Предполагается, что методы Iterator возвращают необходимые значения или вызывают нужные операции
        return call_user_func_array([$this->i, $method], $arguments);
    }
}
