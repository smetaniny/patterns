<?php

use App\Http\Controllers\DelegationFactorySolid\DelegationFactorySolidController;
use App\Http\Controllers\DesignPatterns\Fundamental\DelegationController;
use App\Http\Controllers\DesignPatterns\Fundamental\DesignPatternsController;
use App\Http\Controllers\DesignPatterns\Fundamental\EventChannelController;
use App\Http\Controllers\MO\ProgramTinkerController;
use App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\Observer\MainObserver;
use App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\ObserverPlatina\MainObserverPlatina;
use App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\Strategy\Main;
use App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\Strategy\MainStrategy;
use App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\Strategy\Strategy;
use App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\StrategyPlatina\MainPlatina;
use App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\StrategyPlatina\MainStrategyPlatina;
use App\Http\Controllers\Polymorphism\AdHocPolymorphism\ProgramAdHocPolymorphismController;
use App\Http\Controllers\Polymorphism\CompileTimePolymorphism\ProgramCompileTimePolymorphismController;
use App\Http\Controllers\Polymorphism\InterfacePolymorphism\ProgramInterfacePolymorphismController;
use App\Http\Controllers\Polymorphism\RunTimePolymorphism\ProgramRunTimePolymorphismController;
use App\Http\Controllers\PolymorphismParametric\ProgramParametricPolymorphismController;
use App\Http\Controllers\PHP8\P244Abstract\ProgramP244Abstract;
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
use App\Http\Controllers\PHP8\P386Decorator\ProgramP386Chain;
use App\Http\Controllers\PHP8\P389Facade\ProgramP389Facade;
use App\Http\Controllers\PHP8\P395Interpreter\ProgramP395Interpreter;
use App\Http\Controllers\PHP8\P415Observer\ProgramP415Observer;
use App\Http\Controllers\PHP8\P426Visitor\ProgramP426Visitor;
use App\Http\Controllers\PHP8\P436Command\ProgramP436Command;
use App\Http\Controllers\PHP8\P443NullObject\ProgramP443NullObject;
use App\Http\Controllers\PHP8\ParserInterpreter\ProgramParserInterpreter;
use App\Http\Controllers\PolymorphismStatic\ProgramStaticPolymorphismController;
use App\Http\Controllers\SOLID\D\Example2\OrderController;
use App\Http\Controllers\SOLID\L2\SolidL2Controller;
use App\Http\Controllers\SOLID\O\example2\ContactInfoStrategyController;
use App\Http\Controllers\SpecialistPatterns\AbstractFactory\ProgramSpecialistAbstractFactory;
use App\Http\Controllers\SpecialistPatterns\Adapter\AdapterClass\ProgramSpecialistAdapterClass;
use App\Http\Controllers\SpecialistPatterns\Adapter\AdapterObject\ProgramSpecialistAdapterObject;
use App\Http\Controllers\SpecialistPatterns\Bridge\ProgramSpecialistBridge;
use App\Http\Controllers\SpecialistPatterns\Builder\ProgramSpecialistBuilder;
use App\Http\Controllers\SpecialistPatterns\Flyweight\ProgramSpecialistFlyweight;
use App\Http\Controllers\SpecialistPatterns\LR\LR1\ProgramLR1;
use App\Http\Controllers\SpecialistPatterns\LR\LR1SP\ProgramLR1SP;
use app\Http\Controllers\SpecialistPatterns\Prototype\ProgramSpecialistPrototype;
use App\Http\Controllers\SpecialistPatterns\Singleton\ProgramSpecialistSingleton;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Inertia\Inertia;

Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm']);


Route::get('/cache_clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('clear-compiled');
    return "All caches cleared!";
});

// Машинное обучение
Route::get('/tinker', [ProgramTinkerController::class, 'index']);

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
Route::get('/solid_L2', [SolidL2Controller::class, 'index']);
Route::get('/solid_O', [ContactInfoStrategyController::class, 'index']);
Route::get('/solid_D', [OrderController::class, 'placeOnlineOrder']);

Route::get('/parametricPolymorphism', [ProgramParametricPolymorphismController::class, 'index']);
Route::get('/staticPolymorphism', [ProgramStaticPolymorphismController::class, 'index']);
Route::get('/runTimePolymorphism', [ProgramRunTimePolymorphismController::class, 'index']);
Route::get('/compileTimePolymorphism', [ProgramCompileTimePolymorphismController::class, 'index']);
Route::get('/AdHocPolymorphism', [ProgramAdHocPolymorphismController::class, 'index']);
Route::get('/interfacePolymorphism', [ProgramInterfacePolymorphismController::class, 'index']);

/**
 * PHP8
 */
Route::get('/PHP8/P244Abstract', [ProgramP244Abstract::class, 'index']);
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
Route::get('/PHP8/P386Chain', [ProgramP386Chain::class, 'index']);
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
Route::get('/specialistPatterns/bridge', [ProgramSpecialistBridge::class, 'index']);
Route::get('/specialistPatterns/flyweight', [ProgramSpecialistFlyweight::class, 'index']);
//Route::get('/specialistPatterns/proxy', [ProgramSpecialistProxy::class, 'index']);


Route::get('/packages/{filename}', function ($filename) {

    $path = 'packages/' . $filename;
    if (Storage::disk('packages')->exists($path)) {
        // Файл существует в директории 'packages'
        dd('File exists');
    } else {
        // Файл не существует
        dd('File does not exist');
    }


    $path = "http://patterns/packages/test.jpg";
    $headers = get_headers($path);
    if (!file_exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = response($file, 200)->header("Content-Type", $type);

    return $response;
})->where('filename', '.*');

/**
 * Final
 */
Route::get('/bot', [\App\Http\Controllers\Finam\TradingBotController::class, 'executeBot']);


Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('welcome');

/**
 * PatternsDesignGangFour
 */
// Создания карточек товаров с различными способами отображения
Route::get('/patternsDesignGangFour/strategyPlatina', [MainStrategyPlatina::class, 'index']);
Route::get('/patternsDesignGangFour/strategy', [MainStrategy::class, 'index']);

// Уведомления наблюдателей (клиентов) о новых поступлениях в магазине
Route::get('/patternsDesignGangFour/observerPlatina', [MainObserverPlatina::class, 'index']);
Route::get('/patternsDesignGangFour/observer', [MainObserver::class, 'index']);
