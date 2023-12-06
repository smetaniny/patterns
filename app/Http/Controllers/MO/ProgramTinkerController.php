<?php

namespace App\Http\Controllers\MO;

use PHPJuice\Slopeone\Algorithm;

class ProgramTinkerController
{

    public function index()
    {
        // Создание экземпляра SlopeOne
        $slopeOne = new Algorithm();
        // Пример кода для рекомендательной системы
        $preferences = [
            ['user_id' => 1, 'material' => 'gold', 'color' => 'yellow', 'style' => 'elegant', 'price' => 500],
            ['user_id' => 1, 'material' => 'silver', 'color' => 'blue', 'style' => 'modern', 'price' => 200],
            ['user_id' => 2, 'material' => 'gold', 'color' => 'red', 'style' => 'elegant', 'price' => 600],
            ['user_id' => 2, 'material' => 'diamond', 'color' => 'white', 'style' => 'classy', 'price' => 1500],
            ['user_id' => 3, 'material' => 'platinum', 'color' => 'green', 'style' => 'modern', 'price' => 800],
            ['user_id' => 3, 'material' => 'silver', 'color' => 'black', 'style' => 'classy', 'price' => 300],
        ];


        // Добавление предпочтений
        foreach ($preferences as $preference) {
            $slopeOne->addPreference($preference['user_id'], $preference['material'], $preference['price']);
        }

        // Получение рекомендаций для пользователя
        $userRecommendations = $slopeOne->predict('user1');

        // Отображение рекомендаций
        foreach ($userRecommendations as $item => $rating) {
            $this->info("Рекомендуемый предмет: $item, Рейтинг: $rating");
        }
    }
}

