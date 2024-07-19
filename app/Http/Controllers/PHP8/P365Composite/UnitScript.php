<?php

namespace App\Http\Controllers\PHP8\P365Composite;

/**
 * Класс UnitScript представляет собой вспомогательный класс, предназначенный для выполнения операций
 * над объектами единицы в контексте Composite паттерна.
 */
class UnitScript
{
    /**
     * Присоединяет новую единицу к существующей композитной единице (если таковая существует).
     * Если композит не существует, создает новую армию и добавляет в нее существующую и новую единицы.
     *
     * @param Unit $newUnit Новая единица, которую необходимо присоединить
     * @param Unit $occupyingUnit Существующая единица, к которой необходимо присоединить новую
     *
     * @return CompositeUnit Композитная единица, к которой была присоединена новая единица
     */
    public static function joinExisting(Unit $newUnit, Unit $occupyingUnit): CompositeUnit
    {
        $comp = $occupyingUnit->getComposite();

        if (!is_null($comp)) {
            // Если композит существует, добавляем новую единицу к нему.
            $comp->addUnit($newUnit);
        } else {
            // Если композит не существует, создаем новую армию и добавляем в нее существующую и новую единицы.
            $comp = new Army();
            $comp->addUnit($occupyingUnit);
            $comp->addUnit($newUnit);
        }

        return $comp;
    }
}
