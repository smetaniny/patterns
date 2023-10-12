<?php

namespace app\Http\Controllers;

// №1 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Абстрактный класс ParamHandler, от которого наследуются XmlParamHandler и TextParamHandler.
abstract class ParamHandler
{
    protected array $params = [];   // Свойство для хранения параметров.
    protected string $source;      // Свойство для хранения источника.

    // Конструктор класса, принимает строку (источник) и устанавливает свойство $source.
    public function construct(string $source)
    {
        $this->source = $source;
    }

    // Метод для добавления параметра в массив $params по ключу.
    public function addParam(string $key, string $val): void
    {
        $this->params[$key] = $val;
    }

    // Метод для получения всех параметров в виде массива.
    public function getAUParams(): array
    {
        return $this->params;
    }

    // Статический метод для создания экземпляра класса ParamHandler на основе типа файла.
    public static function getInstance(string $filename): ParamHandler
    {
        if (preg_match("/\.xml$/i", $filename)) {
            return new XmlParamHandler($filename); // Если файл с расширением .xml, создаем XmlParamHandler.
        }
        return new TextParamHandler($filename);   // В противном случае создаем TextParamHandler.
    }

    // Абстрактные методы для записи и чтения параметров, реализация которых будет в наследниках.
    abstract public function write(): void;

    abstract public function read(): void;
}

// Класс XmlParamHandler, наследуется от ParamHandler.
class XmlParamHandler extends ParamHandler
{
    // Реализация метода write для записи данных в формате XML.
    public function write(): void
    {
        // Запись XML
        // с использованием $this->params
    }

    // Реализация метода read для чтения данных из формата XML.
    public function read(): void
    {
        // Чтение XML
        // и заполнение $this->params
    }
}

// Класс TextParamHandler, наследуется от ParamHandler.
class TextParamHandler extends ParamHandler
{
    // Реализация метода write для записи данных в текстовом формате.
    public function write(): void
    {
        // Запись текста
        // с использованием $this->params
    }

    // Реализация метода read для чтения данных из текстового формата.
    public function read(): void
    {
        // Чтение текста
        // и заполнение $this->params
    }
}

// №1 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
