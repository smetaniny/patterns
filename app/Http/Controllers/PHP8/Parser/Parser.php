<?php

namespace App\Http\Controllers\PHP8\Parser;

/**
 * Абстрактный класс Parser представляет собой базовый класс для всех парсеров в системе.
 */
abstract class Parser
{
    public const GIP_RESPECTSPACE = 1;
    protected bool $respectSpace = false;
    protected static bool $debug = false;
    protected bool $discard = false;
    protected string $name;
    private static int $count = 0;
    protected Handler $handler;

    /**
     * Создает новый объект парсера.
     *
     * @param string|null $name Название парсера (по умолчанию null).
     * @param array $options Дополнительные опции парсера (по умолчанию пустой массив).
     */
    public function __construct(string $name = null, array $options = [])
    {
        if (is_null($name)) {
            self::$count++;
            $this->name = get_class($this) . " (" . self::$count . ")";
        } else {
            $this->name = $name;
        }

        if (isset($options[self::GIP_RESPECTSPACE])) {
            $this->respectSpace = true;
        }
    }

    /**
     * Включает или выключает режим учета пробелов в парсере.
     *
     * @param bool $bool Включить (true) или выключить (false) учет пробелов.
     */
    public function spaceSignificant(bool $bool): void
    {
        $this->respectSpace = $bool;
    }

    /**
     * Устанавливает режим отладки для всех парсеров.
     *
     * @param bool $bool Включить (true) или выключить (false) режим отладки.
     */
    public static function setDebug(bool $bool): void
    {
        self::$debug = $bool;
    }

    /**
     * Устанавливает обработчик для парсера.
     *
     * @param Handler $handler Обработчик, который будет вызван после успешного анализа текста.
     */
    public function setHandler(Handler $handler): void
    {
        $this->handler = $handler;
    }

    /**
     * Метод next переходит к следующему токену в тексте.
     *
     * @param Scanner $scanner Сканер, используемый для анализа текста.
     */
    protected function next(Scanner $scanner): void
    {
        $scanner->nextToken();
        if (!$this->respectSpace) {
            $scanner->eatWhiteSpace();
        }
    }

    /**
     * Метод discard указывает, что результат парсера не должен быть сохранен в контексте.
     */
    public function discard(): void
    {
        $this->discard = true;
    }

    /**
     * Метод trigger проверяет, активируется ли текущий парсер на основе текущего токена.
     *
     * @param Scanner $scanner Сканер, используемый для анализа текста.
     *
     * @return bool Возвращает true, если парсер активируется, в противном случае - false.
     */
    abstract public function trigger(Scanner $scanner): bool;

    /**
     * Метод term проверяет, завершается ли парсер, после успешного анализа текста.
     *
     * @return bool Возвращает true, если парсер завершается после успешного анализа, в противном случае - false.
     */
    public function term(): bool
    {
        return true;
    }

    /**
     * Метод doScan выполняет анализ текста и возвращает результат анализа.
     *
     * @param Scanner $scanner Сканер, используемый для анализа текста.
     *
     * @return bool Возвращает true, если анализ завершился успешно, в противном случае - false.
     */
    abstract protected function doScan(Scanner $scanner): bool;

    /**
     * Метод invokeHandler вызывает обработчик после успешного анализа текста, если обработчик установлен.
     *
     * @param Scanner $scanner Сканер, используемый для анализа текста.
     */
    protected function invokeHandler(Scanner $scanner): void
    {
        if (!empty($this->handler)) {
            $this->report("Вызов обработчика: " . get_class($this->handler));
            $this->handler->handleMatch($this, $scanner);
        }
    }

    /**
     * Метод report выводит отладочную информацию, если включен режим отладки.
     *
     * @param string $msg Сообщение для вывода в отладочной информации.
     */
    protected function report($msg): void
    {
        if (self::$debug) {
            print "<{$this->name}> " . get_class($this) . $msg;
        }
    }

    /**
     * Метод push добавляет результат анализа в контекст.
     *
     * @param Scanner $scanner Сканер, используемый для анализа текста.
     */
    protected function push(Scanner $scanner): void
    {
        $context = $scanner->getContext();
        $context->pushResult($scanner->token());
    }
}
