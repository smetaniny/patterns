<?php

namespace App\Http\Controllers\PHP8\Parser;

/**
 * Класс WordParse представляет парсер для поиска слова (последовательности букв) во входном тексте.
 */
class WordParse extends Parser
{
    /**
     * Создает новый объект WordParse.
     *
     * @param string|null $word  Слово, которое нужно найти (по умолчанию null, что означает любое слово).
     * @param string|null $name  Название парсера (по умолчанию null).
     * @param array $options     Дополнительные опции парсера (по умолчанию пустой массив).
     */
    public function __construct(
        private $word = null,
                $name = null,
                $options = []
    )
    {
        parent::__construct($name, $options);
    }

    /**
     * Метод trigger проверяет, является ли текущий токен словом (последовательностью букв) и совпадает ли он с заданным словом (если задано).
     *
     * @param Scanner $scanner Сканер, используемый для анализа текста.
     * @return bool Возвращает true, если текущий токен является словом и совпадает с заданным словом (или если слово не задано), в противном случае - false.
     */
    public function trigger(Scanner $scanner): bool
    {
        if ($scanner->tokenType() != Scanner::WORD) {
            return false;
        }
        if (is_null($this->word)) {
            return true;
        }
        return ($this->word == $scanner->token());
    }

    /**
     * Метод doScan выполняет сканирование и проверяет, совпадает ли текущий токен с заданным словом (если слово задано).
     *
     * @param Scanner $scanner Сканер, используемый для анализа текста.
     * @return bool Возвращает true, если текущий токен является словом и совпадает с заданным словом (или если слово не задано), в противном случае - false.
     */
    protected function doScan(Scanner $scanner): bool
    {
        return ($this->trigger($scanner));
    }
}
