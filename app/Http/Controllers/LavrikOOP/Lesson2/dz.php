<?php

class dz
{

}

// Реализуйте Storage имплементирующий IStorage.

interface IJsonSerialize {
    public function jsonSerialize();
}

interface IStorage
{
    public function add(string $key, mixed $data): void;

    public function remove(string $key): void;

    public function contains(string $key): bool;

    public function get(string $key): mixed;
}

class Storage implements IStorage, IJsonSerialize
{
    public function add(string $key, mixed $data): void
    {
        echo "Добавили логи";
    }

    public function remove(string $key): void
    {
        echo "Удалили логи";
    }

    public function contains(string $key): bool
    {
        echo "Содержит логи";
        return true;
    }

    public function get(string $key): mixed
    {
        echo "Получили логи";
        return true;
    }

    public function jsonSerialize()
    {
        // TODO: Implement jsonSerialize() method.
    }
}

class Animal implements IJsonSerialize
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

    public function jsonSerialize()
    {
        echo "jsonSerialize";
    }
}

// Обяжите Animal и Storage реализовать метод jsonSerialize, который нужен классу JSONLogger:
class JSONLogger
{
    protected array $objects = [];

    public function addObject($obj): void
    {
        $this->objects[] = $obj;
    }

    public function log(string $betweenLogs = ','): string
    {
        $logs = array_map(function ($obj) {
            return $obj->jsonSerialize();
        }, $this->objects);

        return implode($betweenLogs, $logs);
    }
}

$a1 = new Animal('Mirzik', 20, 5);
$a1 = new Animal('Bobik', 30, 3);
$gameStorage = new Storage();
$gameStorage->add('test', mt_rand(1, 10));


$logger = new JSONLogger();
$logger->addObject($a1);
$logger->addObject($a1);
$logger->addObject($gameStorage);

echo $logger->log('<br />') . '<hr />';
