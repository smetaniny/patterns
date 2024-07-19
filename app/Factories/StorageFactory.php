<?php

namespace App\Factories;

use App\Services\BaseStorage;
use App\Services\FileStorage;
use Illuminate\Contracts\Container\BindingResolutionException;

class StorageFactory
{
    /**
     * @throws BindingResolutionException
     */
    public function createStorage(bool $isGuestUser)
    {
        if (!$isGuestUser) {
            // Используем FileStorage для гостей
            return app()->make(FileStorage::class);
        } else {
            // Используем OtherStorage для зарегистрированных пользователей
            return app()->make(BaseStorage::class);
        }
    }
}
