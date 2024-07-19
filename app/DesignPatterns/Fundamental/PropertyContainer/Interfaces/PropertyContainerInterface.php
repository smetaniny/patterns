<?php

namespace App\DesignPatterns\Fundamental\PropertyContainer\Interfaces;


/**
 * interface PropertyContainerInterface
 */
interface PropertyContainerInterface
{
    /**
     * Add property
     *
     * @param $propertyName
     * @param $value
     *
     * @return mixed
     *  @noinspection PhpMissingReturnTypeInspection
     */
    function addProperty($propertyName, $value);


    /**
     * Delete property
     *
     * @param $propertyName
     *
     * @return mixed
     *  @noinspection PhpMissingReturnTypeInspection
     */
    function deleteProperty($propertyName);


    /**
     * Get property
     *
     * @param $propertyName
     *
     * @return mixed
     */
    function getProperty($propertyName): mixed;


    /**
     * Set property
     *
     * @param $propertyName
     * @param $value
     *
     * @return mixed
     * @noinspection PhpMissingReturnTypeInspection
     */
    function setProperty($propertyName, $value);
}
