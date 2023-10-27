<?php

namespace App\Http\Controllers\PHP8\P339ServiceLocator;

class ProgramP339ServiceLocator
{
    public function index()
    {
        $commsMgr = AppConfig::getlnstance()->getCommsManager();
        print $commsMgr->getApptEncoder()->encode();
    }
}
