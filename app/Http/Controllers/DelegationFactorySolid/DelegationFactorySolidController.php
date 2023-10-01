<?php

namespace App\Http\Controllers\DelegationFactorySolid;

use App\Contracts\StorageInterface;
use App\Factories\StorageFactory;
use Illuminate\Contracts\Container\BindingResolutionException;

class DelegationFactorySolidController
{
    protected StorageInterface $storage;

    /**
     * @return StorageInterface
     */
    public function getStorage(): StorageInterface
    {
        return $this->storage;
    }

    /**
     * @throws BindingResolutionException
     */
    public function __construct(StorageFactory $storageFactory)
    {
        // Логика примера. Если авторизован, то пишем в базу иначе в файл
        $this->storage = $storageFactory->createStorage(true);
    }

    public function index(): string
    {
        // Теперь, в зависимости от $isGuestUser, будет выбрано соответствующее хранилище
        $flag = $this->storage->add("Передаем файл");

        return $flag ? "Все ок " . $this->storage->message() : "При записи произошла ошибка " . $this->storage->message();
    }
}
