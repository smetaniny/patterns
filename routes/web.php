<?php

use App\Http\Controllers\DelegationFactorySolid\DelegationFactorySolidController;
use App\Http\Controllers\DesignPatterns\Fundamental\DelegationController;
use App\Http\Controllers\DesignPatterns\Fundamental\DesignPatternsController;
use App\Http\Controllers\DesignPatterns\Fundamental\EventChannelController;
use App\Http\Controllers\PHP8\Strategy292\FixedCostStrategy;
use App\Http\Controllers\PHP8\Strategy292\Lecture;
use App\Http\Controllers\PHP8\Strategy292\Seminar;
use App\Http\Controllers\PHP8\Strategy292\TimedCostStrategy;
use App\Http\Controllers\SOLID\D\Example2\OrderController;
use App\Http\Controllers\SOLID\O\example2\ContactInfoStrategyController;
use Illuminate\Support\Facades\Route;
use PlatinaKostroma\ImageProcessor\Contracts\ImageProcessorInterface;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (ImageProcessorInterface $imageProcessor) {
    $imageProcessor->sanitizeFileName();
});

// Делегирование
Route::get('/delegationController', [DelegationController::class, 'renderOutput']);

// Паттерн проектирования
Route::get('/designPatternsController', [DesignPatternsController::class, 'renderOutput']);

// Канал событий
Route::get('/eventChannelController', [EventChannelController::class, 'eventChannel']);

// Принципы ООП (SOLID) и паттерны проектирования (Делегирование и Фабрика)
Route::get('/delegationFactorySolid', [DelegationFactorySolidController::class, 'index']);

//Это для теста делал проектировщик задач
Route::get('/job', function () {
    App\Jobs\SendMessage::dispatch("TEST");
    return view('welcome');
});

Route::get('/slid_O', [ContactInfoStrategyController::class, 'index']);
Route::get('/slid_D', [OrderController::class, 'placeOnlineOrder']);

Route::get('/Strategy292', function () {
    $lessons[] = new Seminar(4, new TimedCostStrategy(), "Цветы");
    $lessons[] = new Lecture(7, new FixedCostStrategy(), "Фамин Иван Иваныч");
    foreach ($lessons as $lesson) {
        echo "Оплата за занятие {$lesson->cost()}. <br/>\n";
        echo "Тип оплаты: {$lesson->chargeType()} <br/>\n";
        echo "Длительность урока: {$lesson->getDuration()} <br/>\n";

        // Добавляем этот блок для семинаров
        if ($lesson instanceof Seminar) {
            echo "Тема семинара: {$lesson->getTopic()} <br/>\n";
        }

        if ($lesson instanceof Lecture) {
            echo "Лектор: {$lesson->getRector()} <br/>\n";
        }

        echo "<hr/>\n";
    }
});
