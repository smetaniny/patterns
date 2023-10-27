<?php

namespace App\Http\Controllers\PHP8\P436Command;

class ProgramP436Command
{
    public function index() {
        $controller = new Controller();
        $context = $controller->getContext();
        $context->addParam('action', 'login');
        $context->addParam('username', 'Иван ');
        $context->addParam('pass', 'tiddles');

        $controller->process();
        print $context->getError();
    }
}
