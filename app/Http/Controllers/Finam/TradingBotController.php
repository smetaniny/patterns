<?php

namespace App\Http\Controllers\Finam;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;

class TradingBotController extends Controller
{
//    private $accessToken = "CAEQwqW7ARoYututz/AooiR0JUgQiLMVDNj9WWOOfNay";
    private $accessToken = "CAEQxKW7ARoYrij8j7RgG9H/cQFJ1EOfoA5aUrUGm2n2";

    public function executeBot()
    {
        $symbol = "AAPL"; // Пример символа акции (Apple)
        $timeframe = "D1"; // Дневной таймфрейм
        $candles = $this->getDayCandles($symbol, $timeframe);

        if ($candles) {
            $action = $this->analyzeCandles($candles);
            $this->placeOrder($action, $symbol);
            return response()->json(["message" => "Бот успешно выполнен"], 200);
        } else {
            return response()->json(["error" => "Не удалось получить данные свечей"], 500);
        }
    }

    private function getDayCandles($symbol, $timeframe)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->accessToken
        ])->get("https://trade-api.finam.ru/public/api/v1/day-candles?symbol=$symbol&timeframe=$timeframe");

        // Проверка успешности выполнения запроса
        if ($response->successful()) {
            return $response->json();
        } else {
            // Вывод информации об ошибке в случае неудачного запроса
            dd($response->status(), $response->body());
            return null;
        }
    }

    private function analyzeCandles($candles)
    {
        if ($candles) {
            $lastCandle = end($candles); // Берем последнюю свечу
            $openPrice = $lastCandle['o']; // Цена открытия
            $closePrice = $lastCandle['c']; // Цена закрытия
            if ($closePrice > $openPrice) {
                return "buy";
            } elseif ($closePrice < $openPrice) {
                return "sell";
            } else {
                return "hold";
            }
        } else {
            return "no_data";
        }
    }

    private function placeOrder($action, $symbol)
    {
        // Здесь должен быть код для создания заявки, используя API Finam
        // В данном примере просто выводим сообщение
        \Log::info("Выполняем действие '$action' для инструмента '$symbol'");
    }
}

