<?php

namespace App\Http\Controllers\SpecialistPatterns\Builder;

// Класс Director представляет директора, управляющего процессом построения объекта с использованием строителя.
class Director {
    private Builder $builder;

    // Конструктор класса Director, принимающий объект строителя.
    public function __construct(Builder $builder) {
        $this->builder = $builder;
    }

    // Метод make() инициирует процесс построения объекта.
    public function make($withServiceLine) {
        // Сбрасываем состояние строителя.
        $this->builder->reset();
        // Подготавливаем строителя.
        $this->builder->prepare();
        // Выполняем основную работу строителя.
        $this->builder->mainWork();
        // Если требуется, добавляем дополнительные компоненты.
        if ($withServiceLine) {
            $this->builder->addServiceLines();
        }
        // Завершаем процесс построения объекта.
        $this->builder->finish();
    }
}
