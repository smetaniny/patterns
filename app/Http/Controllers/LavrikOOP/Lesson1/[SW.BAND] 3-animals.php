<?php

class Animal
{
    // Объявляем свойства класса Animal
    public $name;
    public $health;
    public $alive;
    protected $power;

    // Конструктор класса Animal, принимающий имя, здоровье и силу
    public function __construct(string $name, int $health, int $power)
    {
        // Инициализируем свойства объекта Animal
        $this->name = $name;
        $this->health = $health;
        $this->power = $power;
        $this->alive = true;
    }

    // Метод для вычисления урона
    public function calcDamage()
    {
        return $this->power * (mt_rand(100, 300) / 200);
    }

    // Метод для применения урона к здоровью
    public function applyDamage(float $damage)
    {
        $this->health -= $damage;

        // Если здоровье стало меньше или равно нулю, животное умирает
        if ($this->health <= 0) {
            $this->health = 0;
            $this->alive = false;
        }
    }
}

// Класс Dog наследует все свойства и методы класса Animal
class Dog extends Animal
{

}


// Класс Cat также наследует свойства и методы класса Animal
class Cat extends Animal
{
    // Дополнительное свойство класса Cat
    private $lifes;

    // Конструктор класса Cat, добавляющий дополнительное свойство $lifes
    public function __construct(string $name, int $health, int $power)
    {
        // Вызываем конструктор родительского класса Animal
        parent::__construct($name, $health, $power);
        $this->lifes = 9;
        $this->baseHealth = $health;
    }

    // Переопределенный метод для применения урона
    public function applyDamage(float $damage)
    {
        // Вызываем родительский метод applyDamage
        parent::applyDamage($damage);

        // Если кот умер и у него остались жизни, он оживает
        if (!$this->alive) {
            $this->lifes--;
            $this->health = $this->baseHealth;
            $this->alive = true;
        }
    }
}

// Класс Mouse также наследует свойства и методы класса Animal
class Mouse extends Animal
{
    // Дополнительное свойство класса Mouse
    private $hiddenLevel;

    // Конструктор класса Mouse, добавляющий дополнительное свойство $hiddenLevel
    public function __construct(string $name, int $health, int $power)
    {
        // Вызываем конструктор родительского класса Animal
        parent::__construct($name, $health, $power);
        $this->hiddenLevel = 0.95;
    }

    // Метод для установки уровня скрытности
    public function setHiddenLevel(float $level)
    {
        $this->hiddenLevel = $level;
    }

    // Переопределенный метод для применения урона
    public function applyDamage(float $damage)
    {
        // Если уровень скрытности не преодолен, то мы можем получить урон
        if ((mt_rand(1, 100) / 100) > $this->hiddenLevel) {
            parent::applyDamage($damage);
        }
    }
}

// Класс GameCore для управления игрой
class GameCore
{
    // Приватное свойство для хранения игровых юнитов (животных)
    private $units;

    // Конструктор класса GameCore
    public function __construct()
    {
        $this->units = [];
    }

    // Метод для добавления юнита (животного) в игру
    public function addUnit(Animal $unit)
    {
        $this->units[] = $unit;
    }

    // Метод для запуска игры
    public function run()
    {
        $i = 1;
        while (count($this->units) > 1) {
            echo "Round $i <br>";
            $this->nextTick();
            $i++;
            echo '<hr>';
        }
    }

    // Метод для выполнения одного игрового тика
    public function nextTick()
    {
        foreach ($this->units as $unit) {
            $damage = $unit->calcDamage();
            $target = $this->getRandomUnit($unit);
            $targetPrevHealth = $target->health;
            $target->applyDamage($damage);

            if ($unit->health !== 0) {
                echo "{$unit->name} ударила {$target->name}, повреждения=$damage, 
                здоровье {$target->health}  <br>";
            }
        }

        // Удаляем умерших юнитов из массива
        $this->units = array_values(array_filter($this->units, function ($unit) {
            return $unit->alive;
        }));
    }

    // Метод для выбора случайного юнита для атаки
    private function getRandomUnit(Animal $exclude)
    {
        $units = array_values(array_filter($this->units, function (Animal $unit) use ($exclude) {
            return $unit !== $exclude;
        }));

        return $units[mt_rand(0, count($units) - 1)];
    }
}

// Создаем объект класса GameCore
$core = new GameCore();

// Добавляем различных животных в игру
$core->addUnit(new Cat('Пуня', 1220, 500));
$core->addUnit(new Dog('Bobik', 200, 10));
$core->addUnit(new Mouse('Jerry', 10, 3));
$core->addUnit(new Dog('Volk', 180, 9));
$core->addUnit(new Mouse('Guffy', 10, 5));

// Запускаем игру
$core->run();


