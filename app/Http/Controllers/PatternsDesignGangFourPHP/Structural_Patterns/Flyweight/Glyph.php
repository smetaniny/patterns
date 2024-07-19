<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Structural_Patterns\Flyweight;

/**
 * Класс Glyph представляет абстрактный глиф, который является базовым классом для всех глифов.
 * Он определяет общие операции над глифами, такие как отрисовка, установка и получение шрифта, а также навигация по
 * глифам. Класс содержит виртуальные методы, которые подлежат реализации в производных классах.
 */

class Glyph
{

    // Метод для отрисовки глифа
    public function draw($window, $context): void
    {
       Draw::render(new Window(), new GlyphContext());
    }

    // Методы для работы со шрифтом
    public function setFont($font, $context): void
    {
        echo "Glyph::SetFont(Font*, GlyphContext&)" . PHP_EOL;
    }

    public function getFont($context)
    {
        echo "Glyph::GetFont(GlyphContext&)" . PHP_EOL;
        return null;
    }

    // Методы для навигации по глифам
    public function first($context): void
    {
        echo "Glyph::First(GlyphContext&)" . PHP_EOL;
    }

    public function next($context): void
    {
        echo "Glyph::Next(GlyphContext&)" . PHP_EOL;
    }

    public function isDone($context): bool
    {
        echo "Glyph::IsDone(GlyphContext&)" . PHP_EOL;
        return false;
    }

    public function current($context)
    {
        echo "Glyph* Glyph::Current(GlyphContext&)" . PHP_EOL;
        return null;
    }

    // Методы для вставки и удаления глифов
    public function insert($glyph, $context): void
    {
        echo "void Glyph::Insert(Glyph*, GlyphContext&)" . PHP_EOL;
    }

    public function remove($context): void
    {
        echo "void Glyph::Remove(GlyphContext&)" . PHP_EOL;
    }
}


