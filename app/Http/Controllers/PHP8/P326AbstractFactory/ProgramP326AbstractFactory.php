<?php

namespace App\Http\Controllers\PHP8\P326AbstractFactory;

class ProgramP326AbstractFactory
{
    public function index() {
        $mgr = new BloggsCommsManager();
        print $mgr->make(1)->encode();
    }
}
