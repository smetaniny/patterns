<?php

namespace App\Http\Controllers\PHP8\P426Visitor;

class TroopCarrier extends CompositeUnit
{
    /**
     * @throws UnitException
     */
    public function addUnit(Unit $unit): void
    {
        if ($unit instanceof Cavalry) {
            throw new UnitException("Лошади не ездят на БТР");
        }
        parent::addUnit($unit);
    }

    public function bombardStrength(): int
    {
        return 0;
    }
}
