<?php

namespace App\Http\Controllers\PHP8\P386Decorator;

/**
 * Класс AuthenticateRequest представляет собой конкретный декоратор, ответственный за аутентификацию запроса.
 * Он наследуется от класса DecorateProcess и реализует метод process(), добавляя аутентификацию к обработке запроса.
 */
class AuthenticateRequest extends DecorateProcess
{
    /**
     * Метод process() реализует аутентификацию запроса и передает управление далее в цепочку обработки.
     *
     * @param RequestHelper $req Объект RequestHelper, предоставляющий информацию о запросе.
     */
    public function process(RequestHelper $req): void
    {
        print __CLASS__ . ": запрос аутентификации <br />";
        $this->processrequest->process($req);
    }
}
