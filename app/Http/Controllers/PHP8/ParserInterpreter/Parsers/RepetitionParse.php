<?php

namespace App\Http\Controllers\PHP8\ParserInterpreter\Parsers;

use App\Http\Controllers\PHP8\ParserInterpreter\Scanner\Scanner;
use Exception;

/**
 * Класс RepetitionParse представляет собой парсер, который выполняет повторяющийся анализ с использованием одного
 * подпарсера. Он может быть настроен на минимальное и максимальное количество повторений.
 */
class RepetitionParse extends CollectionParse
{
    /**
     * Конструктор класса RepetitionParse.
     *
     * @param int $min Минимальное количество повторений (по умолчанию 0).
     * @param int $max Максимальное количество повторений (по умолчанию 0, что означает неограниченное количество
     *     повторений).
     * @param string|null $name Название парсера (по умолчанию null).
     * @param array $options Опции парсера (по умолчанию пустой массив).
     *
     * @throws Exception Если максимум ($max) меньше минимума ($min).
     */
    public function __construct(
        private int $min = 0,
        private int $max = 0,
        ?string     $name = null,
        array       $options = []
    )
    {
        parent::__construct($name, $options);
        if ($max < $min && $max > 0) {
            throw new Exception("Максимум ($max) меньше минимума ($min).");
        }
    }

    /**
     * Всегда возвращает true, так как RepetitionParse всегда активен.
     *
     * @param Scanner $scanner Объект Scanner для анализа текста.
     *
     * @return bool Всегда возвращает true.
     */
    public function trigger(Scanner $scanner): bool
    {
        return true;
    }

    /**
     * Выполняет анализ текста с использованием одного подпарсера в коллекции.
     * Парсер может повторяться от минимального до максимального количества раз.
     *
     * @param Scanner $scanner Объект Scanner для анализа текста.
     *
     * @return bool Возвращает true, если повторяющийся анализ выполнен успешно; в противном случае возвращает false.
     */
    protected function doScan(Scanner $scanner): bool
    {
        // Сохранение начального состояния сканера
        $start_state = $scanner->getState();

        // Проверка наличия подпарсеров в коллекции
        if (empty($this->parsers)) {
            // Если коллекция пуста, анализ считается успешным
            return true;
        }

        // Получение первого подпарсера из коллекции
        $parser = $this->parsers[0];
        // Счетчик повторений
        $count = 0;

        while (true) {
            if ($this->max > 0 && $count >= $this->max) {
                // Достигнуто максимальное количество повторений
                return true;
            }

            // Проверка, активен ли текущий подпарсер
            if (!$parser->trigger($scanner)) {
                if ($this->min == 0 || $count >= $this->min) {
                    // Анализ считается успешным
                    return true;
                } else {
                    // Восстановление начального состояния и возврат неудачи
                    $scanner->setState($start_state);
                    return false;
                }
            }

            // Выполнение анализа текущим подпарсером
            if (!$parser->scan($scanner)) {
                if ($this->min == 0 || $count >= $this->min) {
                    // Анализ считается успешным
                    return true;
                } else {
                    // Восстановление начального состояния и возврат неудачи
                    $scanner->setState($start_state);
                    return false;
                }
            }

            // Увеличение счетчика повторений
            $count++;
        }
    }
}
