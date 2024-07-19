<?php
namespace App\Http\Controllers\SOLID\S;

/**
 * SOLID
 * s — Принцип единой обязанности (ответственности)
 * Single responsibility principle
 *
 * Любой объект должен иметь лишь одну обязанность и эта обязанность должна быть полностью реализована в классе объекта
 */


$logger = new Logger();
$product = new Product($logger);
$product->setPrice(10);
