<?php


use App\Http\Controllers\DesignPatterns\Fundamental\DelegationController;
use App\Http\Controllers\DesignPatterns\Fundamental\DesignPatternsController;
use App\Http\Controllers\DesignPatterns\Fundamental\EventChannelController;
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

//Делегирование
Route::get('/delegationController', [DelegationController::class, 'renderOutput']);
//Паттерн проектирования
Route::get('/designPatternsController', [DesignPatternsController::class, 'renderOutput']);
//Канал событий
Route::get('/eventChannelController', [EventChannelController::class, 'eventChannel']);


//Это для теста делал проектировщик задач
/*Route::get('/job', function () {
    App\Jobs\SendMessage::dispatch("TEST");
    return view('welcome');
});*/

Route::get('/slid_O', [ContactInfoStrategyController::class, 'index']);
Route::get('/slid_D', [OrderController::class, 'placeOnlineOrder']);
