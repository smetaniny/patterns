<?php

namespace App\Http\Controllers\PHP8\Parser;

/**
 * Класс ScannerState представляет состояние сканера и текущего токена во время сканирования текста.
 */
class ScannerState
{
    /**
     * @var int Номер текущей строки.
     */
    public int $line_no;

    /**
     * @var int Номер текущего символа в исходном тексте.
     */
    public int $char_no;

    /**
     * @var string|null Текущий токен.
     */
    public ?string $token;

    /**
     * @var int Тип текущего токена.
     */
    public int $token_type;

    /**
     * @var Context Контекст, связанный с состоянием сканера.
     */
    public Context $context;

    /**
     * @var Reader Интерфейс Reader, используемый для чтения символов из исходного текста.
     */
    public Reader $r;
}
