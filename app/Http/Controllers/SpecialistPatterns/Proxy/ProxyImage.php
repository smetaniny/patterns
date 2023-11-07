<?php

namespace App\Http\Controllers\SpecialistPatterns\Proxy;

// Заместитель (Proxy) для изображения
class ProxyImage implements Image
{
    private $realImage;
    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    public function display()
    {
        if ($this->realImage == null) {
            $this->realImage = new RealImage($this->filename);
        }
        $this->realImage->display();
    }
}
