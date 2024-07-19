<?php
namespace App\Http\Controllers\SOLID\O;

/**
 * SOLID
 * O — Принцип открытости / закрытости
 * Open / closed principle
 *
 * Классы должны быть открыты для расширения и закрыты для изменения
 *
 * В данной задаче логируем ошибки не только в файл, а еще и в БД (расширяем класс)
 */


$FileLogger = new FileLogger();
$BDLogger = new BDLogger();

$product = new Product($BDLogger);
$product->setPrice(10);
