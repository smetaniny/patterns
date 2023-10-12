<?php

namespace App\Http\Controllers\PHP8\Employee_308;

// Объявление абстрактного класса Employee
abstract class Employee
{
    protected string $name;
    private static array $types = ['Minion', 'CluedUp', 'WellConnected'];

    // Конструктор класса Employee, который принимает имя сотрудника и инициализирует его как защищенное свойство
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public static function recruit(string $name): Employee
    {
        // Генерация случайного числа в диапазоне от 1 до количества элементов в массиве self::$types и вычитание 1
        $num = rand(1, count(self::$types)) - 1;

        // Формирование имени класса с учетом текущего пространства имен и выбранного типа сотрудника
        $class = __NAMESPACE__ . "\\" . self::$types[$num];

        // Создание экземпляра класса сотрудника, используя сгенерированное имя класса и переданное имя сотрудника
        return new $class($name);
    }

    // Абстрактный метод fire, который должен быть реализован в подклассах и не возвращает ничего (void)
    abstract public function fire(): void;
}
