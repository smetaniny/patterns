<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\Iterator;

/**
 * Паттерн Итератор предоставляет способ последовательного доступа к элементам составного объекта
 * без раскрытия его внутреннего представления. Он обеспечивает унифицированный интерфейс
 * для обхода различных структур данных (например, списков, массивов, деревьев) без
 * знания их внутренней реализации.
 *
 * В данном примере используется паттерн Итератор для обхода списка сотрудников и
 * печати информации о них. Создается список сотрудников, к нему добавляются сотрудники,
 * затем создается объект, отвечающий за печать определенного количества сотрудников,
 * и происходит итерация по списку сотрудников с помощью этого объекта.
 */
class MainIterator
{
    public function index()
    {
        // Создание списка сотрудников и добавление в него элементов
        $employeeList = new EmployeeList();
        $employeeList->add(new Employee("John", 1));
        $employeeList->add(new Employee("Alice", 2));
        $employeeList->add(new Employee("Bob", 3));

        // Создание итератора
        $it = new ListIterator($employeeList);

        // Пример использования итератора
        for ($it->first(); !$it->isDone(); $it->next()) {
            $employee = $it->currentItem();
            echo "Name: " . $employee->getName() . ", ID: " . $employee->getId() . "\n";
        }
    }
}
