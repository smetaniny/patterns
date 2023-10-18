<?php

namespace App\Http\Controllers\PHP8\Parser;

use JetBrains\PhpStorm\Pure;

/**
 * Класс StringLiteralParse предназначен для разбора строковых литералов в тексте.
 */
class StringLiteralParse extends Parser
{
    /**
     * Проверяет, совпадает ли текущий токен с началом строкового литерала.
     *
     * @param Scanner $scanner Экземпляр сканера.
     *
     * @return bool Возвращает true, если текущий токен является началом строкового литерала, в противном случае false.
     */
    #[Pure] public function trigger(Scanner $scanner): bool
    {
        return (
            $scanner->tokenType() == Scanner::APOS ||
            $scanner->tokenType() == Scanner::QUOTE
        );
    }

    /**
     * Не выполняет действий для push-операции.
     *
     * @param Scanner $scanner Экземпляр сканера.
     */
    protected function push(Scanner $scanner): void
    {
    }

    /**
     * Выполняет разбор строки между началом и концом строкового литерала.
     *
     * @param Scanner $scanner Экземпляр сканера.
     *
     * @return bool Возвращает true, если строковый литерал был успешно разобран, в противном случае false.
     */
    protected function doScan(Scanner $scanner): bool
    {
        $quotechar = $scanner->tokenType();
        $ret = false;
        $string = "";
        while ($token = $scanner->nextToken()) {
            if ($token == $quotechar) {
                $ret = true;
                break;
            }
            $string .= $scanner->token();
        }
        if ($string && !$this->discard) {
            $scanner->getContext()->pushResult($string);
        }
        return $ret;
    }
}
