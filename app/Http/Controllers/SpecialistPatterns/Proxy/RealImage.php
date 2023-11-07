<?php

namespace App\Http\Controllers\SpecialistPatterns\Proxy;

// Реальный объект, представляющий изображение
class RealImage implements Image
{
    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
        $this->loadImage();
    }

    private function loadImage()
    {
        echo "Загрузка изображения: $this->filename<br>";
    }

    public function display()
    {
        echo "Показ изображения: $this->filename<br>";
    }
}
