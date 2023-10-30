<?php

use App\Http\Controllers\DelegationFactorySolid\DelegationFactorySolidController;
use App\Http\Controllers\DesignPatterns\Fundamental\DelegationController;
use App\Http\Controllers\DesignPatterns\Fundamental\DesignPatternsController;
use App\Http\Controllers\DesignPatterns\Fundamental\EventChannelController;
use App\Http\Controllers\PHP8\P292Strategy\ProgramP292Strategy;
use App\Http\Controllers\PHP8\P299Notifier\ProgramP299Notifier;
use App\Http\Controllers\PHP8\P308Employee\ProgramP308Employee;
use App\Http\Controllers\PHP8\P313Singleton\ProgramP313Singleton;
use App\Http\Controllers\PHP8\P319FactoryMethod\ProgramP319FactoryMethod;
use App\Http\Controllers\PHP8\P326AbstractFactory\ProgramP326AbstractFactory;
use App\Http\Controllers\PHP8\P333Prototype\ProgramP333Prototype;
use App\Http\Controllers\PHP8\P339ServiceLocator\ProgramP339ServiceLocator;
use App\Http\Controllers\PHP8\P342DependencyInjection\ProgramP342DependencyInjection;
use App\Http\Controllers\PHP8\P365Composite\ProgramP365Composite;
use App\Http\Controllers\PHP8\P380Decorator\ProgramP380Decorator;
use App\Http\Controllers\PHP8\P386Decorator\ProgramP386Decorator;
use App\Http\Controllers\PHP8\P389Facade\ProgramP389Facade;
use App\Http\Controllers\PHP8\P395Interpreter\ProgramP395Interpreter;
use App\Http\Controllers\PHP8\P415Observer\ProgramP415Observer;
use App\Http\Controllers\PHP8\P426Visitor\ProgramP426Visitor;
use App\Http\Controllers\PHP8\P436Command\ProgramP436Command;
use App\Http\Controllers\PHP8\P443NullObject\ProgramP443NullObject;
use App\Http\Controllers\PHP8\ParserInterpreter\ProgramParserInterpreter;
use App\Http\Controllers\SOLID\D\Example2\OrderController;
use App\Http\Controllers\SOLID\O\example2\ContactInfoStrategyController;
use App\Http\Controllers\SpecialistPatterns\AbstractFactory\ProgramSpecialistAbstractFactory;
use App\Http\Controllers\SpecialistPatterns\Adapter\AdapterClass\ProgramSpecialistAdapterClass;
use App\Http\Controllers\SpecialistPatterns\Adapter\AdapterObject\ProgramSpecialistAdapterObject;
use App\Http\Controllers\SpecialistPatterns\Builder\ProgramSpecialistBuilder;
use App\Http\Controllers\SpecialistPatterns\LR\LR1\ProgramLR1;
use App\Http\Controllers\SpecialistPatterns\LR\LR1SP\ProgramLR1SP;
use app\Http\Controllers\SpecialistPatterns\Prototype\ProgramSpecialistPrototype;
use App\Http\Controllers\SpecialistPatterns\Singleton\ProgramSpecialistSingleton;
use Illuminate\Support\Facades\Route;
use PlatinaKostroma\ImageProcessor\Contracts\ImageProcessorInterface;

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

/**
 * PHP8
 */
Route::get('/PHP8/P292Strategy', [ProgramP292Strategy::class, 'index']);
Route::get('/PHP8/P299Notifier', [ProgramP299Notifier::class, 'index']);
Route::get('/PHP8/P308Employee', [ProgramP308Employee::class, 'index']);
Route::get('/PHP8/P313Singleton', [ProgramP313Singleton::class, 'index']);
Route::get('/PHP8/P319FactoryMethod', [ProgramP319FactoryMethod::class, 'index']);
Route::get('/PHP8/P326AbstractFactory', [ProgramP326AbstractFactory::class, 'index']);
Route::get('/PHP8/P333Prototype', [ProgramP333Prototype::class, 'index']);
Route::get('/PHP8/P339ServiceLocator', [ProgramP339ServiceLocator::class, 'index']);
Route::get('/PHP8/P342DependencyInjection', [ProgramP342DependencyInjection::class, 'index']);
Route::get('/PHP8/P365Composite', [ProgramP365Composite::class, 'index']);
Route::get('/PHP8/P380Decorator', [ProgramP380Decorator::class, 'index']);
Route::get('/PHP8/P386Decorator', [ProgramP386Decorator::class, 'index']);
Route::get('/PHP8/P389Facade', [ProgramP389Facade::class, 'index']);
Route::get('/PHP8/P395Interpreter', [ProgramP395Interpreter::class, 'index']);
Route::get('/PHP8/P415Observer', [ProgramP415Observer::class, 'index']);
Route::get('/PHP8/P426Visitor', [ProgramP426Visitor::class, 'index']);
Route::get('/PHP8/P436Command', [ProgramP436Command::class, 'index']);
Route::get('/PHP8/P443NullObject', [ProgramP443NullObject::class, 'index']);

Route::get('/PHP8/ParserInterpreter', [ProgramParserInterpreter::class, 'index']);

Route::get('/PHP8/LR1', [ProgramLR1::class, 'index']);
Route::get('/PHP8/LR1SP', [ProgramLR1SP::class, 'index']);

/**
 * specialistPatterns
 */
Route::get('/specialistPatterns/abstractFactory', [ProgramSpecialistAbstractFactory::class, 'index']);
Route::get('/specialistPatterns/prototype', [ProgramSpecialistPrototype::class, 'index']);
Route::get('/specialistPatterns/builder', [ProgramSpecialistBuilder::class, 'index']);
Route::get('/specialistPatterns/singleton', [ProgramSpecialistSingleton::class, 'index']);
Route::get('/specialistPatterns/adapterClass', [ProgramSpecialistAdapterClass::class, 'index']);
Route::get('/specialistPatterns/adapterObject', [ProgramSpecialistAdapterObject::class, 'index']);

















