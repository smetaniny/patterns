<?php

namespace App\Http\Controllers\SOLID\O\example2;

use App\Contracts\ContactInfoStrategy;
use App\Http\Controllers\Controller;

class ContactInfoStrategyController extends Controller
{
    private ContactInfoStrategy $contactInfoStrategy;

    public function __construct(ContactInfoStrategy $contactInfoStrategy)
    {
        $this->contactInfoStrategy = $contactInfoStrategy;
        dd($this->contactInfoStrategy->getInfo());
    }
}
