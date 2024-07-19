<?php

namespace app\Http\Controllers\SOLID\D;

class Restaurant implements IFoodProvider
{
    public function getFood(): string
    {
        return "Куриный бульон без хлеба";
    }
}
