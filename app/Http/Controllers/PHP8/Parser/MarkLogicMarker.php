<?php

namespace App\Http\Controllers\PHP8\Parser;

use Exception;

class MarkLogicMarker extends Marker
{
    private MarkParse $engine;

    /**
     * Конструктор класса MarkLogicMarker.
     *
     * @param string $test Тестовая строка, используемая для создания MarkParse.
     *
     * @throws Exception
     */
    public function construct(string $test)
    {
        parent::construct($test);
        $this->engine = new MarkParse($test);
    }

    /**
     * Метод, который выполняет разметку (маркировку) строки ответа.
     *
     * @param string $response Строка ответа, которую нужно разметить.
     * @return bool Возвращает `true`, если разметка выполнена успешно, в противном случае `false`.
     */
    public function mark(string $response): bool
    {
        return $this->engine->evaluate($response);
    }
}
