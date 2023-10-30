<?php

namespace App\Http\Controllers\SpecialistPatterns\AbstractFactory;

use App\Http\Controllers\SpecialistPatterns\AbstractFactory\Factories\StoneHouseFactory;
use App\Http\Controllers\SpecialistPatterns\AbstractFactory\Factories\WoodHouseFactory;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class ProgramSpecialistAbstractFactory
{
    public static function index()
    {

        Log::channel('info')->info("Это лог с канала 'info'", ['user_id' => 9525,]);
        Log::channel('warning')->warning("Это лог с канала 'warning'", ['user_id' => 9525,]);
        Log::channel('error')->error("Это лог с канала 'error'", ['user_id' => 9525,]);
        Log::channel('debug')->debug("Это лог с канала 'debug'", ['user_id' => 9525,]);

        // Получаем текущую локаль и сравниваем ее с "ru" (необязательно в верхнем регистре)
        if (App::getLocale() == "ru") {
            // Если локаль - русская, создаем фабрику для строительства каменных домов
            $factory = new StoneHouseFactory();
        } else {
            // В противном случае создаем фабрику для строительства деревянных домов
            $factory = new WoodHouseFactory();
        }

        // Создаем стены дома и строим их
        $factory->createWall()->build();

        // Создаем крышу дома, покрываем её и обеспечиваем защиту от воды
        $factory->createRoof()->cover()->waterProtect();

        // Создаем окно, устанавливаем его и открываем
        $factory->createWindow()->install()->open();
    }
}
