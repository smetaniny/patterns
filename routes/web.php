<?php

use App\Http\Controllers\DelegationFactorySolid\DelegationFactorySolidController;
use App\Http\Controllers\DesignPatterns\Fundamental\DelegationController;
use App\Http\Controllers\DesignPatterns\Fundamental\DesignPatternsController;
use App\Http\Controllers\DesignPatterns\Fundamental\EventChannelController;
use App\Http\Controllers\PHP8\UML290\Lecture;
use App\Http\Controllers\PHP8\UML290\Lesson;
use App\Http\Controllers\PHP8\UML290\Seminar;
use App\Http\Controllers\SOLID\D\Example2\OrderController;
use App\Http\Controllers\SOLID\O\example2\ContactInfoStrategyController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    // UML290
    $lecture = new Lecture(5, Lesson::FIXED);
    print "{$lecture->cost()} ({$lecture->chargeType()})\n";
    $seminar = new Seminar(3, Lesson::TIMED);
    print "{$seminar->cost()} ({$seminar->chargeType()})\n";
    // End UML290
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
/*Route::get('/job', function () {
    App\Jobs\SendMessage::dispatch("TEST");
    return view('welcome');
});*/

Route::get('/slid_O', [ContactInfoStrategyController::class, 'index']);
Route::get('/slid_D', [OrderController::class, 'placeOnlineOrder']);
