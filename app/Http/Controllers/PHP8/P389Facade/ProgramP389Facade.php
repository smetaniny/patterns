<?php

namespace App\Http\Controllers\PHP8\P389Facade;

class ProgramP389Facade
{
    public function index() {
        $facade = new ProductFacade(base_path("App/Http/Controllers/PHP8/P389Facade/facade.txt"));
        $object = $facade->getProduct("532");
        print_r($object);
    }
}
