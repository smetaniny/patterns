<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\Observer;

/**
 * Интерфейс Наблюдателя.
 */
interface Observer
{
    /**
     * Метод обновления, который вызывается при изменении состояния субъекта.
     *
     * @param Subject $theChangedSubject Измененный субъект.
     *
     * @return mixed Результат обновления (возможно, что не всегда используется).
     */
    public function update(Subject $theChangedSubject);
}
