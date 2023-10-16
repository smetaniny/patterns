<?php

namespace App\Http\Controllers\PHP8\P380Decorator;

/**
 * Абстрактный класс TileDecorator представляет собой абстрактный декоратор для плитки (местности) в игровом контексте.
 * Этот класс наследуется от абстрактного класса Tile и обеспечивает базовую структуру для всех конкретных декораторов.
 */
abstract class TileDecorator extends Tile
{
    /**
     * @var Tile Базовая местность (плитка), которую декоратор расширяет.
     */
    protected Tile $tile;

    /**
     * Конструктор класса TileDecorator. Принимает базовую местность (плитку) для декорации и сохраняет ее внутри декоратора.
     *
     * @param Tile $tile Базовая местность (плитка), которую нужно декорировать
     */
    public function __construct(Tile $tile)
    {
        $this->tile = $tile;
    }
}
