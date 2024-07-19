<?php

namespace App\Http\Controllers\PHP8\P365Composite;

/**
 * Абстрактный класс CompositeUnit расширяет базовый класс Unit и представляет композитную единицу,
 * которая может содержать подчиненные единицы.
 */
abstract class CompositeUnit extends Unit
{
    /**
     * @var Unit[] Массив для хранения подчиненных единиц в композитной единице.
     */
    private array $units = [];

    /**
     * Возвращает текущий объект композитной единицы. Этот метод введен для упрощения работы с композитами.
     *
     * @return CompositeUnit|null Объект композитной единицы или null, если объект не является композитом.
     */
    public function getComposite(): ?CompositeUnit
    {
        return $this;
    }

    /**
     * Добавляет подчиненную единицу к текущей композитной единице.
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
     * Удаляет подчиненную единицу из текущей композитной единицы.
     *
     * @param Unit $unit Единица для удаления
     */
    public function removeUnit(Unit $unit): void
    {
        $idx = array_search($unit, $this->units, true);
        if (is_int($idx))
            array_splice($this->units, $idx, 1, []);
    }

    /**
     * Возвращает массив подчиненных единиц, содержащихся в текущей композитной единице.
     *
     * @return Unit[] Массив подчиненных единиц
     */
    public function getUnits(): array
    {
        return $this->units;
    }
}
