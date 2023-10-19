<?php

namespace App\Http\Controllers\PHP8\ParserInterpreter\Readers;

use App\Http\Controllers\PHP8\ParserInterpreter\Interface\Reader;

/**
 * Класс StringReader реализует интерфейс Reader и предоставляет возможность чтения символов из строки.
 */
class StringReader implements Reader
{
    private int $pos;
    private int $len;

    /**
     * Конструктор класса StringReader.
     *
     * @param string $in Исходная строка, из которой будут считываться символы.
     */
    public function __construct(private string $in)
    {
        $this->pos = 0;
        $this->len = strlen($in);
    }

    /**
     * Возвращает следующий символ из строки и сдвигает указатель позиции на один символ вперед.
     *
     * @return string Возвращает следующий символ из строки.
     * Если достигнут конец строки, возвращает логическое значение `false`.
     */
    public function getChar(): string
    {
        if ($this->pos >= $this->len) {
            return false;
        }
        $char = substr($this->in, $this->pos, 1);
        $this->pos++;
        return $char;
    }

    /**
     * Возвращает текущую позицию в строке.
     *
     * @return int Текущая позиция в строке.
     */
    public function getPos(): int
    {
        return $this->pos;
    }

    /**
     * Откатывает указатель позиции на один символ назад.
     */
    public function pushBackChar(): void
    {
        $this->pos--;
    }

    /**
     * Возвращает исходную строку, с которой работает StringReader.
     *
     * @return string Исходная строка.
     */
    public function string(): string
    {
        return $this->in;
    }
}
