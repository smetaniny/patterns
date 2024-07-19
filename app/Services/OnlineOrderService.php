<?php

namespace App\Services;

use App\Contracts\OrderService;

class OnlineOrderService implements OrderService {
    public function placeOrder(array $orderData) {
        dd('Логика обработки заказа для онлайн заказов');
    }
}
