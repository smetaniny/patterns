<?php

namespace App\Contracts;

interface ContactInfoStrategy
{
    public function getInfo(): array;
}
