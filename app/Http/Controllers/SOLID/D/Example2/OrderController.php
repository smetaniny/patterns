<?php

namespace App\Http\Controllers\SOLID\D\Example2;

use App\Contracts\OrderService;

class OrderController {
    private $orderService;

    public function __construct(OrderService $orderService) {
        $this->orderService = $orderService;
    }

    public function placeOnlineOrder() {
        // Получить данные о заказе из $request
        $orderData = ["Заказ 1"];

        // Передать данные сервису заказов для обработки
        $this->orderService->placeOrder($orderData);


        // Вернуть ответ клиенту
        return response()->json(['message' => 'Заказ успешно размещен']);
    }
}
