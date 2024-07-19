<?php

class Tag
{
    // Объявляем защищенные свойства класса Tag: $name, $attributes и $children.
    protected $name;
    protected $attributes = [];
    protected $children = [];

    // Конструктор класса, принимает имя тега, атрибуты и детей.
    public function __construct($name, $attributes = [], $children = [])
    {
        // Устанавливаем значения свойствам $name, $attributes и $children.
        $this->name = $name;
        $this->attributes = $attributes;
        $this->children = $children;
    }

    // Метод __toString(), который будет вызван при преобразовании объекта в строку.
    public function __toString()
    {
        // Создаем пустую строку для атрибутов.
        $attributes = '';

        // Проходим по массиву атрибутов и формируем строку атрибутов.
        foreach ($this->attributes as $key => $value) {
            $attributes .= " $key=\"$value\"";
        }

        // Создаем пустую строку для детей.
        $children = '';

        // Проходим по массиву детей и объединяем их в строку.
        foreach ($this->children as $child) {
            $children .= $child;
        }

        // Возвращаем строку с разметкой тега.
        return "<$this->name$attributes>$children</$this->name>";
    }
}

// Класс SingleTag наследует класс Tag.
class SingleTag extends Tag
{
    // Конструктор класса, принимает имя тега и атрибуты.
    public function __construct($name, $attributes = [])
    {
        // Вызываем конструктор родительского класса Tag.
        parent::__construct($name, $attributes);
    }

    // Переопределяем метод __toString() для одиночных тегов.
    public function __toString()
    {
        // Создаем пустую строку для атрибутов.
        $attributes = '';

        // Проходим по массиву атрибутов и формируем строку атрибутов.
        foreach ($this->attributes as $key => $value) {
            $attributes .= " $key=\"$value\"";
        }

        // Возвращаем строку с разметкой одиночного тега.
        return "<$this->name$attributes>";
    }
}

// Класс PairTag наследует класс Tag.
class PairTag extends Tag
{
    // Конструктор класса, принимает имя тега, атрибуты и детей.
    public function __construct($name, $attributes = [], $children = [])
    {
        // Вызываем конструктор родительского класса Tag.
        parent::__construct($name, $attributes, $children);
    }
}

// Функция forTest() создает объектную разметку формы и возвращает объект PairTag.
function forTest(): PairTag
{
    // Создаем объект PairTag "form" с детьми.
    $form = new PairTag('form', [], [
        new PairTag('label', [], [
            new SingleTag('img', ['src' => 'f1.jpg', 'alt' => 'f1 not found']),
            new SingleTag('input', ['type' => 'text', 'name' => 'f1']),
        ]),
        new PairTag('label', [], [
            new SingleTag('img', ['src' => 'f2.jpg', 'alt' => 'f2 not found']),
            new SingleTag('input', ['type' => 'password', 'name' => 'f2']),
        ]),
        new SingleTag('input', ['type' => 'submit', 'value' => 'Send']),
    ]);

    // Возвращаем созданный объект PairTag.
    return $form;
}

// Используем функцию forTest() для получения объектной разметки формы.
$form = forTest();

// Выводим объектную разметку на экран.
// С помощью магического метода __toString(), представленного в классах Tag, SingleTag и PairTag,
// объектное представление HTML разметки может быть преобразовано в строку HTML кода.
// Этот код может быть выведен на экран с помощью echo, как показано во втором блоке кода.
echo $form;
