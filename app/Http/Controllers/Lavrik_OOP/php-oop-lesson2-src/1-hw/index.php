<?php

class Tag
{
    // Свойство для хранения имени тега
    protected string $name;

    // Свойство для хранения атрибутов тега
    protected array $attrs = [];

    public function __construct(string $name)
    {
        // Конструктор класса, устанавливает имя тега при создании объекта
        $this->name = $name;
    }

    public function attr(string $name, string $value)
    {
        // Метод для добавления атрибутов в массив атрибутов и возвращает текущий объект для чейнинга
        $this->attrs[$name] = $value;
        return $this;
    }

    public function render(): string
    {
        // Метод для отрисовки тега, в данной реализации возвращает пустую строку
        return '';
    }

    protected function attrsToString(): string
    {
        // Создание массива для хранения пар "имя атрибута - значение атрибута"
        $pairs = [];

        foreach ($this->attrs as $name => $value) {
            // Формирование строк вида "имя="значение""
            $pairs[] = "$name=\"$value\"";
        }

        // Объединение пар в строку с разделителем пробелом
        return implode(' ', $pairs);
    }
}

class SingleTag extends Tag
{
    public function render(): string
    {
        // Преобразование атрибутов в строку
        $attrsStr = $this->attrsToString();

        // Возвращает строку вида "<имя_тега атрибуты>"
        return "<{$this->name} $attrsStr>";
    }
}

class PairTag extends Tag
{
    // Массив для хранения дочерних тегов
    protected array $children = [];

    public function appendChild(Tag $child)
    {
        // Метод для добавления дочернего тега и возвращает текущий объект для чейнинга
        $this->children[] = $child;
        return $this;
    }

    public function render(): string
    {
        // Преобразование атрибутов в строку
        $attrsStr = $this->attrsToString();

        $childrenHTML = array_map(function (Tag $tag) {
            // Преобразование дочерних тегов в HTML и сохранение в массив
            return $tag->render();
        }, $this->children);

        // Объединение HTML-кода дочерних тегов в одну строку
        $innerHTML = implode('', $childrenHTML);

        // Возвращает строку вида "<имя_тега атрибуты>дочерние_теги</имя_тега>"
        return "<{$this->name} $attrsStr>$innerHTML</{$this->name}>";
    }
}

function forTest(): PairTag
{
    // Создание объекта PairTag с именем 'form'
    return (new PairTag('form'))
        ->appendChild(
        // Создание объекта PairTag с именем 'label'
            (new PairTag('label'))
                // Создание и добавление дочерних тегов img и input
                ->appendChild((new SingleTag('img'))->attr('src', 'f1.jpg')->attr('alt', 'f1 not found'))
                ->appendChild((new SingleTag('input'))->attr('type', 'text')->attr('name', 'f1'))
        )
        ->appendChild(
        // Создание объекта PairTag с именем 'label'
            (new PairTag('label'))
                // Создание и добавление дочерних тегов img и input
                ->appendChild((new SingleTag('img'))->attr('src', 'f2.jpg')->attr('alt', 'f2 not found'))
                ->appendChild((new SingleTag('input'))->attr('type', 'password')->attr('name', 'f2'))
        )
        ->appendChild(
        // Создание и добавление дочернего тега input
            (new SingleTag('input'))->attr('type', 'submit')->attr('value', 'Send')
        );
}

// Генерация HTML кода для функции forTest()
$html = forTest()->render();
// Вывод HTML кода
echo $html;
// Вывод HTML кода с преобразованием специальных символов
echo '<hr>' . htmlspecialchars($html);


