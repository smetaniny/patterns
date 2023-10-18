<?php

use App\Http\Controllers\DelegationFactorySolid\DelegationFactorySolidController;
use App\Http\Controllers\DesignPatterns\Fundamental\DelegationController;
use App\Http\Controllers\DesignPatterns\Fundamental\DesignPatternsController;
use App\Http\Controllers\DesignPatterns\Fundamental\EventChannelController;
use App\Http\Controllers\PHP8\P292Strategy\FixedCostStrategy;
use App\Http\Controllers\PHP8\P292Strategy\Lecture;
use App\Http\Controllers\PHP8\P292Strategy\Seminar;
use App\Http\Controllers\PHP8\P292Strategy\TimedCostStrategy;
use App\Http\Controllers\PHP8\P299Notifier\RegistrationMgr;
use App\Http\Controllers\PHP8\P308Employee\Employee;
use App\Http\Controllers\PHP8\P308Employee\NastyBoss;
use App\Http\Controllers\PHP8\P313Singleton\Preferences;
use App\Http\Controllers\PHP8\P319FactoryMethod\BloggsCommsManager;
use App\Http\Controllers\PHP8\P319FactoryMethod\MegaCommsManager;
use App\Http\Controllers\PHP8\P333Prototype\EarthForest;
use App\Http\Controllers\PHP8\P333Prototype\EarthPlains;
use App\Http\Controllers\PHP8\P333Prototype\EarthSea;
use App\Http\Controllers\PHP8\P333Prototype\TerrainFactory;
use App\Http\Controllers\PHP8\P339ServiceLocator\AppConfig;
use App\Http\Controllers\PHP8\P342DependencyInjection\AppointmentMaker;
use App\Http\Controllers\PHP8\P342DependencyInjection\ApptEncoder;
use App\Http\Controllers\PHP8\P342DependencyInjection\ObjectAssembler;
use App\Http\Controllers\PHP8\P365Composite\Archer;
use App\Http\Controllers\PHP8\P365Composite\Army;
use App\Http\Controllers\PHP8\P365Composite\LaserCannonUnit;
use App\Http\Controllers\PHP8\P380Decorator\DiamondDecorator;
use App\Http\Controllers\PHP8\P380Decorator\Plains;
use App\Http\Controllers\PHP8\P380Decorator\PollutionDecorator;
use App\Http\Controllers\PHP8\P386Decorator\AuthenticateRequest;
use App\Http\Controllers\PHP8\P386Decorator\LogRequest;
use App\Http\Controllers\PHP8\P386Decorator\MainProcess;
use App\Http\Controllers\PHP8\P386Decorator\RequestHelper;
use App\Http\Controllers\PHP8\P386Decorator\StructureRequest;
use App\Http\Controllers\PHP8\P389Facade\ProductFacade;
use App\Http\Controllers\PHP8\P395Interpreter\BooleanEqualsExpression;
use App\Http\Controllers\PHP8\P395Interpreter\BooleanOrExpression;
use App\Http\Controllers\PHP8\P395Interpreter\InterpreterContext;
use App\Http\Controllers\PHP8\P395Interpreter\LiteralExpression;
use App\Http\Controllers\PHP8\P395Interpreter\VariableExpression;
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

    $megaAppt = new MegaCommsManager();
    print $megaAppt->getHeaderText();
    print $megaAppt->getApptEncoder()->encode();
    print $megaAppt->getFooterText();
});

Route::get('/PHP8/P326AbstractFactory', function () {
    $mgr = new \App\Http\Controllers\PHP8\P326AbstractFactory\BloggsCommsManager();
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

Route::get('/PHP8/P339ServiceLocator', function () {
    $commsMgr = AppConfig::getlnstance()->getCommsManager();
    print $commsMgr->getApptEncoder()->encode();
});

Route::get('/PHP8/P342DependencyInjection', function () {
    $assembler = new ObjectAssembler(base_path("App/Http/Controllers/PHP8/P342DependencyInjection/objects.xml"));
    $encoder = $assembler->getComponent(ApptEncoder::class);
    $apptmaker = new AppointmentMaker($encoder);
    $out = $apptmaker->makeAppointment();
    print $out;

    $apptmaker = $assembler->getComponent(AppointmentMaker::class);
    $out = $apptmaker->makeAppointment();
    print $out;
});

Route::get('/PHP8/P365Composite', function () {
    // Создание армии
    $main_army = new Army();

    // Добавление юнитов
    $main_army->addUnit(new Archer());
    $main_army->addUnit(new LaserCannonUnit());

    // Создание новой армии
    $sub_army = new Army();

    // Добавление юнитов
    $sub_army->addUnit(new Archer());
    $sub_army->addUnit(new Archer());
    $sub_army->addUnit(new Archer());

    // Добавление второй армии в первую
    $main_army->addUnit($sub_army);

    // Все вычисления выполняются "за кулисами"
    print "Атака с силой: {$main_army->bombardStrength()} <br />";
});

Route::get('/PHP8/P380Decorator', function () {
    $tile = new Plains();
    print $tile->getWealthFactor() . '<br />';

    $tile = new DiamondDecorator(new Plains());
    print $tile->getWealthFactor() . '<br />';

    $tile = new PollutionDecorator(new DiamondDecorator(new Plains()));
    print $tile->getWealthFactor() . '<br />';
});

Route::get('/PHP8/P386Decorator', function () {
    $requestData = [
        'user' => 'example_user',
        'action' => 'some_action',
    ];

    $process =
        new AuthenticateRequest(
            new StructureRequest(
                new LogRequest(
                    new MainProcess()
                )
            )
        );

    $process->process(new RequestHelper($requestData));
});

Route::get('/PHP8/P389Facade', function () {
    $facade = new ProductFacade(base_path("App/Http/Controllers/PHP8/P389Facade/facade.txt"));
    $object = $facade->getProduct("234");
    print_r($object);
});

Route::get('/PHP8/P395Interpreter', function () {
    // Создаем контекст интерпретатора.
    $context = new InterpreterContext();
    // Создаем переменное выражение.
    $input = new VariableExpression('input');

    // Создаем операторное выражение, которое проверяет, равно ли значение input строке 'четыре' или числу 4.
    $statement = new BooleanOrExpression(
        new BooleanEqualsExpression(new LiteralExpression('четыре'), $input),
        new BooleanEqualsExpression($input, new LiteralExpression(4))
    );

    // Перебираем массив значений.
    foreach (["четыре", 4, "52"] as $val) {
        // Устанавливаем значение переменной input.
        $input->setValue($val);
        print "$val:<br />";

        // Интерпретируем операторное выражение и проверяем, верное ли условие.
        $statement->interpret($context);

        if ($context->lookup($statement)) {
            print "Правильный ответ!<br />";
        } else {
            print "Вы ошиблись!<br />";
        }
    }
});

Route::get('/PHP8/ParserInterpreter', function () {
});






























