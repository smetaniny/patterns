<?php

namespace App\Http\Controllers\PHP8\P389Facade;

use JetBrains\PhpStorm\Pure;

class ProductFacade
{
    private array $products = [];

    public function __construct(private string $file)
    {
        $this->compile();
    }

    private function compile(): void
    {
        $lines = getProductFileLines($this->file);
        foreach ($lines as $line)
        {
            $id = getIDFromLine($line);
            $name = getNameFromLine($line);
            $this->products[$id] =
                getProductObjectFromID($id, $name);
        }
    }

    public function getProducts(): array
    {
        return $this->products;
    }

    public function getProduct(string $id): ? Product
    {
        if (isset($this->products[$id]))
        {
            return $this->products[$id];
        }
        return null;
    }
}

/**
 * Чтение строк из файла и возврат их в виде массива.
 *
 * @param string $file Путь к файлу, из которого нужно прочитать строки.
 *
 * @return array Массив строк из файла.
 */
function getProductFileLines(string $file): array
{
    return file($file);
}

/**
 * Создание объекта Product на основе переданных идентификатора и имени продукта.
 *
 * @param string $id Идентификатор продукта.
 * @param string $productname Имя продукта.
 *
 * @return Product Созданный объект Product.
 */
#[Pure] function getProductObjectFromId(string $id, string $productname): Product
{
    // Здесь может быть код поиска в базе данных или другой логикой.
    // В данном примере просто создается новый объект Product.
    return new Product($id, $productname);
}

/**
 * Получение имени продукта из строки.
 *
 * @param string $line Строка, содержащая информацию о продукте.
 *
 * @return string Имя продукта.
 */
function getNameFromLine(string $line): string
{
    if (preg_match("/.*-(•*)\s\d+/", $line, $array)) {
        return str_replace('_', '', $array[1]);
    }
    return "";
}

/**
 * Получение идентификатора продукта из строки.
 *
 * @param string $line Строка, содержащая информацию о продукте.
 *
 * @return int|string Идентификатор продукта или -1, если идентификатор не найден.
 */
function getIDFromLine(string $line): int|string
{
    if (preg_match("/^(\d{1,3})-/", $line, $array)) {
        return $array[1];
    }

    return -1;
}
