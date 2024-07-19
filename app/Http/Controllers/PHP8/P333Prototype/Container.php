<?php

namespace App\Http\Controllers\PHP8\P333Prototype;

class Container
{
    public Contained $contained;

    public function construct()
    {
        $this->contained = new Contained();
    }

    public function __clone()
    {
        // Обеспечить, чтобы клонированный объект
        // содержал клон объекта, хранящегося в
        // свойстве self::$contained, а не ссылку на него
        $this->contained = clone $this->contained;
    }
}
