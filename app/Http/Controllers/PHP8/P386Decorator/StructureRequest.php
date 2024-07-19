<?php

namespace App\Http\Controllers\PHP8\P386Decorator;

/**
 * Класс StructureRequest представляет собой конкретный декоратор, ответственный за структурирование запроса.
 * Он наследуется от класса DecorateProcess и реализует метод process(), добавляя структурирование к обработке запроса.
 */
class StructureRequest extends DecorateProcess
{
    /**
     * Метод process() реализует структурирование запроса и передает управление далее в цепочку обработки.
     *
     * @param RequestHelper $req Объект RequestHelper, предоставляющий информацию о запросе.
     */
    public function process(RequestHelper $req): void
    {
        print __CLASS__ . ": данные структурирующего запроса <br />";
        $this->processrequest->process($req);
    }
}
