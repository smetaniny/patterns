<?php

namespace app\Http\Controllers\PHP8\P244AbstractExample;

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
