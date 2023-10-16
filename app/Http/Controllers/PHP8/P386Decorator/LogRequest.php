<?php

namespace App\Http\Controllers\PHP8\P386Decorator;

/**
 * Класс LogRequest представляет собой конкретный декоратор, ответственный за журналирование запроса.
 * Он наследуется от класса DecorateProcess и реализует метод process(), добавляя журналирование к обработке запроса.
 */
class LogRequest extends DecorateProcess
{
    /**
     * Метод process() реализует журналирование запроса и передает управление далее в цепочку обработки.
     *
     * @param RequestHelper $req Объект RequestHelper, предоставляющий информацию о запросе.
     */
    public function process(RequestHelper $req): void
    {
        print __CLASS__ . ": запрос журналирования <br />";
        $this->processrequest->process($req);
    }
}
