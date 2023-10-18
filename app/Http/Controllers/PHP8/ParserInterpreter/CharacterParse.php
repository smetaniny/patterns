<?php

namespace App\Http\Controllers\PHP8\Parser;

/**
 * Класс CharacterParse представляет парсер для поиска конкретного символа во входном тексте.
 */
class CharacterParse extends ParserInterpreter
{
    /**
     * Создает новый объект CharacterParse.
     *
     * @param string $char     Символ, который нужно найти.
     * @param string|null $name Название парсера (по умолчанию null).
     * @param array $options   Дополнительные опции парсера (по умолчанию пустой массив).
     */
    public function __construct(private string $char, string $name = null, array $options = [])
    {
        parent::__construct($name, $options);
    }

    /**
     * Метод trigger проверяет, совпадает ли текущий токен со значением символа, который ищет этот парсер.
     *
     * @param Scanner $scanner Сканер, используемый для анализа текста.
     * @return bool Возвращает true, если текущий токен совпадает с искомым символом, в противном случае - false.
     */
    public function trigger(Scanner $scanner): bool
    {
        return ($scanner->token() == $this->char);
    }

    /**
     * Метод doScan выполняет сканирование и проверяет, совпадает ли текущий токен с искомым символом.
     *
     * @param Scanner $scanner Сканер, используемый для анализа текста.
     * @return bool Возвращает true, если текущий токен совпадает с искомым символом, в противном случае - false.
     */
    protected function doScan(Scanner $scanner): bool
    {
        return ($this->trigger($scanner));
    }
}
