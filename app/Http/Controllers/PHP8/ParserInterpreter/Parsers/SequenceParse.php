<?php

namespace App\Http\Controllers\PHP8\ParserInterpreter\Parsers;

use App\Http\Controllers\PHP8\ParserInterpreter\Scanner\Scanner;

/**
 * Класс SequenceParse представляет собой парсер, который проверяет,
 * что все его подпарсеры выполнились последовательно.
 */
class SequenceParse extends CollectionParse
{
    /**
     * Проверяет, активирует ли первый подпарсер в коллекции парсера $this.
     *
     * @param Scanner $scanner Объект Scanner для анализа текста.
     * @return bool Возвращает true, если первый парсер активируется; в противном случае возвращает false.
     */
    public function trigger(Scanner $scanner): bool
    {
        if (empty($this->parsers)) {
            return false;
        }
        return $this->parsers[0]->trigger($scanner);
    }

    /**
     * Выполняет анализ текста с использованием подпарсеров в коллекции $this
     * последовательно, возвращая true, если все подпарсеры успешно выполнены.
     *
     * @param Scanner $scanner Объект Scanner для анализа текста.
     * @return bool Возвращает true, если все подпарсеры выполнены успешно; в противном случае возвращает false.
     */
    protected function doScan(Scanner $scanner): bool
    {
        $start_state = $scanner->getState();
        foreach ($this->parsers as $parser) {
            if (!($parser->trigger($scanner) && $parser->scan($scanner)))
                $scanner->setState($start_state);
            return false;
        }
        return true;
    }
}
