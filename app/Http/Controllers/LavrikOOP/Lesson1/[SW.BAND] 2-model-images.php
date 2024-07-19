<?php

/*
    инкапсуляция
*/

class Images
{
    public function upload($file)
    {
        if ($this->check($file['name'])) {
            $this->resize($file);
            $this->watemark($file);
        }
    }

    public function get($id, $size)
    {

    }

    private function resize($file)
    {

    }

    private function check($path)
    {

    }

    private function watemark($img)
    {

    }
}

$images = new Images();
$images->get(1, 2);


//Полиморфизм пример
class Car
{
    public function move()
    {
        echo "Автомобиль двигается по дороге.<br>";
    }
}

class Bicycle
{
    public function move()
    {
        echo "Велосипед двигается по тротуару.<br>";
    }
}

// Функция, использующая полиморфизм
function moveObject($object)
{
    $object->move();
}

// Создаем объекты
$car = new Car();
$bicycle = new Bicycle();

// Вызываем методы с использованием полиморфизма
moveObject($car);       // Вывод: Автомобиль двигается по дороге.
moveObject($bicycle);   // Вывод: Велосипед двигается по тротуару.




