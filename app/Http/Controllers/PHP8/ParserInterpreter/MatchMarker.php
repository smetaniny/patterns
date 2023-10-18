<?php

namespace App\Http\Controllers\PHP8\ParserInterpreter;

class MatchMarker extends Marker
{
    /**
     * Метод, который выполняет разметку (маркировку) строки ответа.
     *
     * @param string $response Строка ответа, которую нужно сравнить с тестовой строкой.
     * @return bool Возвращает `true`, если тестовая строка совпадает со строкой ответа, в противном случае `false`.
     */
    public function mark(string $response): bool
    {
        return ($this->test == $response);
    }
}
