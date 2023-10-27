<?php

namespace App\Http\Controllers\SpecialistPatterns\Builder;

// Класс DocBuilder реализует интерфейс Builder и представляет конкретную реализацию строителя для создания объекта Documentation.
class DocBuilder implements Builder {
    // Создаем переменную для хранения объекта документации.
    private $doc;

    public function reset() {
        // Создаем новый объект документации и связываем его с переменной doc.
        $this->doc = new Documentation();
    }

    public function prepare() {
        // Выводим сообщение о начале подготовки к документированию.
        echo "Подготовка к документированию<br />";
        // Устанавливаем флаг базовой документации в true.
        $this->doc->setBase(true);
    }

    public function mainWork() {
        // Выводим сообщение о начале основной работы.
        echo "Основная работа<br />";
        // Устанавливаем флаг состояния строительства в true.
        $this->doc->setBuilding(true);
    }

    public function addServiceLines() {
        // Выводим сообщение о добавлении дополнительных линий обслуживания.
        echo "Добавление дополнительных линий обслуживания<br />";
        // Устанавливаем флаг дополнительных линий обслуживания в true.
        $this->doc->setServiceLines(true);
    }

    public function finish() {
        // Выводим сообщение о завершении и документировании.
        echo "Завершение и документирование<br />";
        // Устанавливаем флаг завершения в true.
        $this->doc->setFinish(true);
    }

    // Метод getResult() возвращает созданный объект документации.
    public function getResult() {
        return $this->doc;
    }
}
