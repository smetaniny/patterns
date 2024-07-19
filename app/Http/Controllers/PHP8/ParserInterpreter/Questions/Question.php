<?php

namespace App\Http\Controllers\PHP8\ParserInterpreter\Questions;

use App\Http\Controllers\PHP8\ParserInterpreter\Markers\Marker;

/**
 * Абстрактный класс Question представляет собой базовый класс для различных видов вопросов.
 */
abstract class Question
{
    private string $prompt;
    private Marker $marker;

    /**
     * Создает новый объект вопроса с заданным текстовым приглашением и маркером.
     *
     * @param string $prompt Текстовое приглашение для вопроса.
     * @param Marker $marker Маркер, используемый для проверки ответа.
     */
    public function __construct(string $prompt, Marker $marker)
    {
        $this->prompt = $prompt;
        $this->marker = $marker;
    }

    /**
     * Метод mark используется для проверки ответа на вопрос.
     *
     * @param string $response Ответ на вопрос.
     * @return bool Возвращает true, если ответ подходит под маркер, в противном случае - false.
     */
    public function mark(string $response): bool
    {
        return $this->marker->mark($response);
    }
}
