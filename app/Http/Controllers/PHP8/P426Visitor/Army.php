<?php

namespace App\Http\Controllers\PHP8\P426Visitor;

/**
 * Класс Army представляет армию, которая является единицей композита.
 */
class Army extends Unit
{
    /**
     * @var Unit[] Массив для хранения подчиненных единиц (военных подразделений) в армии.
     */
    private array $units = [];

    /**
     * Добавляет подчиненную единицу (военное подразделение) в армию.
     *
     * @param Unit $unit Единица для добавления
     */
    public function addUnit(Unit $unit): void
    {
        if (in_array($unit, $this->units, true)) {
            // Если единица уже существует, не добавляем ее повторно.
            return;
        }

        $this->units[] = $unit;
    }

    /**
     * Удаляет подчиненную единицу (военное подразделение) из армии.
     *
     * @param Unit $unit Единица для удаления
     */
    public function removeUnit(Unit $unit): void
    {
        $idx = array_search($unit, $this->units, true);
        if (is_int($idx)) {
            array_splice($this->units, $idx, 1, []);
        }
    }

    /**
     * Вычисляет общую силу бомбардировки армии путем суммирования сил бомбардировки всех подчиненных единиц.
     *
     * @return int Сила бомбардировки армии
     */
    public function bombardStrength(): int
    {
        $ret = 0;
        foreach ($this->units as $unit) {
            $ret += $unit->bombardStrength();
        }

        return $ret;
    }
}
