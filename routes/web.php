<?php

use App\Http\Controllers\DelegationFactorySolid\DelegationFactorySolidController;
use App\Http\Controllers\DesignPatterns\Fundamental\DelegationController;
use App\Http\Controllers\DesignPatterns\Fundamental\DesignPatternsController;
use App\Http\Controllers\DesignPatterns\Fundamental\EventChannelController;
use App\Http\Controllers\PHP8\Employee_308\Employee;
use App\Http\Controllers\PHP8\Employee_308\NastyBoss;
use App\Http\Controllers\PHP8\FactoryMethod319\BloggsCommsManager;
use App\Http\Controllers\PHP8\FactoryMethod319\MegaApptCommsManager;
use App\Http\Controllers\PHP8\Notifier299\RegistrationMgr;
use App\Http\Controllers\PHP8\P333Prototype\EarthForest;
use App\Http\Controllers\PHP8\P333Prototype\EarthPlains;
use App\Http\Controllers\PHP8\P333Prototype\EarthSea;
use App\Http\Controllers\PHP8\P333Prototype\TerrainFactory;
use App\Http\Controllers\PHP8\Singleton_313\Preferences;
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

Route::get('/PHP8/P292Strategy', function () {
    $lessons[] = new Seminar(4, new TimedCostStrategy(), "Цветы");
    $lessons[] = new Lecture(7, new FixedCostStrategy(), "Фамин Иван Иваныч");
    foreach ($lessons as $lesson) {
        echo "Оплата за занятие {$lesson->cost()}. <br/>";
        echo "Тип оплаты: {$lesson->chargeType()} <br/>";
        echo "Длительность урока: {$lesson->getDuration()} <br/>";

        // Добавляем этот блок для семинаров
        if ($lesson instanceof Seminar) {
            echo "Тема семинара: {$lesson->getTopic()} <br/>";
        }

        if ($lesson instanceof Lecture) {
            echo "Лектор: {$lesson->getRector()} <br/>";
        }
        echo "<hr/>\n";
    }
});

Route::get('/PHP8/P299Notifier', function () {
    $lessons1 = new Seminar(4, new TimedCostStrategy(), "Физика в действии");
    $lessons2 = new Lecture(7, new FixedCostStrategy(), "Карпов Станислав Викторович");
    $mgr = new RegistrationMgr();
    $mgr->register($lessons1);
    $mgr->register($lessons2);
});

Route::get('/PHP8/P308Employee', function () {
    $boss = new NastyBoss();
    $boss->addEmployee(Employee::recruit("Игорь"));
    $boss->addEmployee(Employee::recruit("Владимир"));
    $boss->addEmployee(Employee::recruit("Мария"));
    $boss->projectFails();
    $boss->projectFails();
    $boss->projectFails();
});

Route::get('/PHP8/P313Singleton', function () {
    $pref = Preferences::getInstance();
    $pref->setProperty("name", "Серега");
    unset($pref); // Удаление ссылки

    // Демонстрация, что значение не потеряно:
    $pref2 = Preferences::getInstance();
    print $pref2->getProperty("name") . "<br />";
});

Route::get('/PHP8/P319FactoryMethod', function () {
    $mgr = new BloggsCommsManager();
    print $mgr->getHeaderText();
    print $mgr->getApptEncoder()->encode();
    print $mgr->getFooterText();

    $megaAppt = new MegaApptCommsManager();
    print $megaAppt->getHeaderText();
    print $megaAppt->getApptEncoder()->encode();
    print $megaAppt->getFooterText();
});

Route::get('/PHP8/P326AbstractFactory', function () {
    $mgr = new \App\Http\Controllers\PHP8\AbstractFactory326\BloggsCommsManager();
    print $mgr->make(1)->encode();
});

Route::get('/PHP8/P333Prototype', function () {
    $factory = new TerrainFactory(
        new EarthSea(-1),
        new EarthPlains(),
        new EarthForest()
    );
    print_r($factory->getSea());
    print_r($factory->getPlains());
    print_r($factory->getForest());
});
