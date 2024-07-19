<?php

namespace App\DesignPatterns\Fundamental\PropertyContainer;

use App\DesignPatterns\Fundamental\PropertyContainer\Interfaces\PropertyContainerInterface;
use Exception;

/**
 * Implementation PropertyContainerInterface
 */
class PropertyContainer implements PropertyContainerInterface
{
    /**
     * @var array - properties
     */
    private array $propertyContainer = [];


    /**
     * Add property
     *
     * @param $propertyName
     * @param $value
     *
     * @return void
     */
    function addProperty($propertyName, $value)
    {
        $this->propertyContainer[$propertyName] = $value;
    }


    /**
     * Delete property
     *
     * @param $propertyName
     *
     * @return void
     */
    function deleteProperty($propertyName)
    {
       unset($this->propertyContainer[$propertyName]);
    }


    /**
     * Get property
     *
     * @param $propertyName
     *
     * @return mixed
     */
    function getProperty($propertyName): mixed
    {
       return $this->propertyContainer[$propertyName] ?? null;
    }


    /**
     * Set property
     *
     * @param $propertyName
     * @param $value
     *
     * @return void
     * @throws Exception
     */
    function setProperty($propertyName, $value)
    {
       if (!isset($this->propertyContainer[$propertyName])) {
            throw new Exception("Property [{$propertyName}] not found");
       }

        $this->propertyContainer[$propertyName] = $value;
    }
}
