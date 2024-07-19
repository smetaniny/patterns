<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Foundation_Classes;

class Coord {
    private float $value;

    public function __construct(float $value) {
        $this->value = $value;
    }

    public function getValue(): float {
        return $this->value;
    }

    public function setValue(float $value): void {
        $this->value = $value;
    }

    // Функция для нахождения минимума между двумя значениями
    public static function min(Coord $x, Coord $y): Coord {
        return new Coord(min($x->getValue(), $y->getValue()));
    }

    // Функция для нахождения максимума между двумя значениями
    public static function max(Coord $x, Coord $y): Coord {
        return new Coord(max($x->getValue(), $y->getValue()));
    }

    // Функция для нахождения абсолютного значения числа
    public static function abs(Coord $x): Coord {
        return new Coord(abs($x->getValue()));
    }

    // Функция для округления числа до ближайшего целого
    public static function round(Coord $x): int {
        return round($x->getValue());
    }
}

?>
