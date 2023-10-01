<?php

namespace App\Services;

use App\Contracts\StorageInterface;

class BaseStorage implements StorageInterface
{

    public function add(string $file): bool
    {
        return true;
    }

    public function get(string $filename): bool
    {
        return true;
    }

    public function delete(string $filename): bool
    {
        return true;
    }

    public function message(): string
    {
        return "Запись в базу";
    }
}
