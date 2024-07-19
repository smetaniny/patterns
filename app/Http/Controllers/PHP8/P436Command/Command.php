<?php

namespace App\Http\Controllers\PHP8\P436Command;

// Абстрактный класс Command (Команда)
abstract class Command
{
    // Абстрактный метод, который должен быть реализован в наследниках
    abstract public function execute(CommandContext $context): bool;
}
