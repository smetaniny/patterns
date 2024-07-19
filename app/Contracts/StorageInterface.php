<?php

namespace App\Contracts;

interface StorageInterface
{
    public function add(string $file) : bool;
    public function get(string $filename) : bool;
    public function delete(string $filename): bool;
    public function message(): string;

}
