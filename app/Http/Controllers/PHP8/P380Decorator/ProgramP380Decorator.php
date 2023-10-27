<?php

namespace App\Http\Controllers\PHP8\P380Decorator;

class ProgramP380Decorator
{
    public function index() {
        $tile = new Plains();
        print $tile->getWealthFactor() . '<br />';

        $tile = new DiamondDecorator(new Plains());
        print $tile->getWealthFactor() . '<br />';

        $tile = new PollutionDecorator(new DiamondDecorator(new Plains()));
        print $tile->getWealthFactor() . '<br />';
    }
}
