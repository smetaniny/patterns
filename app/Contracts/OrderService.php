<?php

namespace App\Contracts;

interface OrderService
{
    public function placeOrder(array $orderData);
}
