<?php

namespace app\Http\Controllers\PHP8\P244AbstractExample;

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
