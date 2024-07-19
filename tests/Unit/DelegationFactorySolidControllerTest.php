<?php

namespace Tests\Unit;

use App\Contracts\StorageInterface;
use App\Factories\StorageFactory;
use App\Http\Controllers\DelegationFactorySolid\DelegationFactorySolidController;
use Illuminate\Contracts\Container\BindingResolutionException;
use PHPUnit\Framework\TestCase;

class DelegationFactorySolidControllerTest extends TestCase
{
    /**
     * @throws BindingResolutionException
     */
    public function testCreateStorageReturnsStorageInterfaceObject()
    {
        // Создаем экземпляр фабрики
        $factory = new StorageFactory();

        // Создаем экземпляр контроллера и передаем фабрику
        $controller = new DelegationFactorySolidController($factory);

        // Получаем объект StorageInterface из контроллера
        $storage = $controller->getStorage();

        // Проверяем, что $storage является объектом, реализующим StorageInterface
        $this->assertInstanceOf(StorageInterface::class, $storage);
    }
}
