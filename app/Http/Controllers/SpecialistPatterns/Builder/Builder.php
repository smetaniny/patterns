<?php

namespace App\Http\Controllers\SpecialistPatterns\Builder;

// Интерфейс Builder определяет контракт для строителей, которые создают объекты.
interface Builder {
    // Метод reset() сбрасывает состояние строителя.
    public function reset();

    // Метод prepare() подготавливает строителя к выполнению основной работы.
    public function prepare();

    // Метод mainWork() выполняет основную работу строителя.
    public function mainWork();

    // Метод addServiceLines() добавляет дополнительные компоненты к объекту.
    public function addServiceLines();

    // Метод finish() завершает процесс построения объекта.
    public function finish();
}
