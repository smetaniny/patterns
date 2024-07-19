<?php

namespace App\Http\Controllers\PHP8\ParserInterpreter\Interface;

/**
 * Интерфейс Reader определяет методы для работы с чтением символов из исходного текста.
 */
interface Reader
{
    /**
     * Возвращает один символ из исходного текста в виде строки.
     *
     * @return string Одиночный символ из исходного текста.
     */
    public function getChar(): string;

    /**
     * Возвращает текущую позицию в исходном тексте.
     *
     * @return int Текущая позиция в исходном тексте.
     */
    public function getPos(): int;

    /**
     * Позволяет вернуть символ обратно в поток, возможно для отката на один символ назад в случае ошибки или несоответствия шаблону.
     */
    public function pushBackChar(): void;
}
