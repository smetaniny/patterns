<?php

namespace App\Services;

use App\Contracts\OrderService;

class PhoneOrderService implements OrderService {
    public function placeOrder(array $orderData) {
        dd("Логика обработки заказа для заказов по телефону");
    }
}
