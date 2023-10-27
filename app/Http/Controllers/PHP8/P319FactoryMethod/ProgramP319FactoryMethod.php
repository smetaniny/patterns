<?php

namespace App\Http\Controllers\PHP8\P319FactoryMethod;

class ProgramP319FactoryMethod
{
    public function index() {
        $mgr = new BloggsCommsManager();
        print $mgr->getHeaderText();
        print $mgr->getApptEncoder()->encode();
        print $mgr->getFooterText();

        $megaAppt = new MegaCommsManager();
        print $megaAppt->getHeaderText();
        print $megaAppt->getApptEncoder()->encode();
        print $megaAppt->getFooterText();
    }
}
