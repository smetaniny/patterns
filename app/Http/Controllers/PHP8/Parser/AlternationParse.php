<?php

namespace App\Http\Controllers\PHP8\Parser;

class AlternationParse extends CollectionParse
{

    /**
     * Определяет, сработает ли этот парсер на текущем токене в сканере.
     *
     * @param Scanner $scanner Объект Scanner для анализа текста.
     *
     * @return bool Возвращает true, если хотя бы один подпарсер в коллекции активен; в противном случае возвращает false.
     */
    public function trigger(Scanner $scanner): bool
    {
        // Проверка каждого подпарсера в коллекции на активность
        foreach ($this->parsers as $parser) {
            if ($parser->trigger($scanner)) {
                return true;
            }
        }

        // Если ни один подпарсер не активен, возвращается false
        return false;
    }

    /**
     * Выполняет анализ текста с использованием одного подпарсера в коллекции, выбирая первый подпарсер,
     * который соответствует типу текущего токена в сканере.
     *
     * @param Scanner $scanner Объект Scanner для анализа текста.
     *
     * @return bool Возвращает true, если анализ успешно завершен; в противном случае возвращает false.
     */
    protected function doScan(Scanner $scanner): bool
    {
        // Текущий тип токена
        $type = $scanner->tokenType();

        // Сохранение начального состояния сканера
        $start_state = $scanner->getState();

        // Проверка каждого подпарсера в коллекции
        foreach ($this->parsers as $parser) {
            if ($type == $parser->trigger($scanner) && $parser->scan($scanner)) {
                // Анализ завершен успешно, если подпарсер успешно сработал
                return true;
            }
        }

        // Восстановление начального состояния и возврат неудачи
        $scanner->setState($start_state);
        return false;
    }
}
