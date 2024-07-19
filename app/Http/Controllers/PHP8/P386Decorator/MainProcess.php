<?php

namespace App\Http\Controllers\PHP8\P386Decorator;

/**
 * Класс MainProcess представляет собой конечный элемент (компонент) в цепочке обработки запросов.
 * Он наследуется от класса ProcessRequest и реализует метод process(), выполняющий конечное выполнение запроса.
 */
class MainProcess extends ProcessRequest
{
    /**
     * Метод process() выполняет конечное выполнение запроса и завершает цепочку обработки.
     *
     * @param RequestHelper $req Объект RequestHelper, предоставляющий информацию о запросе.
     */
    public function process(RequestHelper $req): void
    {
        print __CLASS__ . ": выполнение запроса <br />";
    }
}
