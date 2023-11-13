<?php

namespace App\Http\Controllers\SpecialistPatterns\Proxy;

// Заместитель (Proxy) для изображения
class ProxyImageProxy implements ImageProxy
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
            $this->realImage = new RealImageProxy($this->filename);
        }
        $this->realImage->display();
    }
}
