<?php

namespace App\Http\Controllers\PHP8\P333Prototype;

use JetBrains\PhpStorm<br />oReturn;

class ProgramP333Prototype
{
    #[NoReturn] public function index()
    {
        // Создание экземпляра фабрики ландшафта (TerrainFactory) с передачей прототипов разных типов ландшафта.
        $factory = new TerrainFactory(
            new EarthSea(-1), // Прототип морского ландшафта с указанием уровня (-1).
            new EarthPlains(),          // Прототип равнинного ландшафта.
            new EarthForest()           // Прототип лесного ландшафта.
        );

        // Вызов методов для получения объектов разных типов ландшафта.
        $sea = $factory->getSea();       // Получение объекта морского ландшафта.
        $plains = $factory->getPlains(); // Получение объекта равнинного ландшафта.
        $forest = $factory->getForest(); // Получение объекта лесного ландшафта.

        // Использование функции dd() для вывода значений полученных объектов в удобном формате для отладки.
        dd($sea, $plains, $forest);
    }
}
