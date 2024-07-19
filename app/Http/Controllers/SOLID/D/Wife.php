<?php

namespace app\Http\Controllers\SOLID\D;

/**
 * Жена
 */
class Wife implements IFoodProvider
{
    public function getFood(): string
    {
        return "Куриный бульон с хлебом";
    }
}
