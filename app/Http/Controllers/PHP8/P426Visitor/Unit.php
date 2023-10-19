<?php

namespace App\Http\Controllers\PHP8\P426Visitor;

/**
 * Абстрактный класс Unit представляет базовую единицу компоновки.
 */
abstract class Unit
{
    public function getComposite(): ?CompositeUnit
    {
        return null;
    }

    /**
     * Абстрактный метод, который должен быть реализован в дочерних классах.
     * Возвращает силу бомбардировки данной единицы.
     *
     * @return int Сила бомбардировки данной единицы
     */
    abstract public function bombardStrength(): int;


    public function accept(ArmyVisitor $visitor): void
    {
        $refthis = new \ReflectionClass(get_class($this));
        $method = "Посещение " . $refthis->getShortName();
        $visitor->$method($this);
    }

    protected function setDepth($depth): void
    {
        $this->depth = $depth;
    }

    public function getDepth(): int
    {
        return $this->depth;
    }
}
