<?php

namespace App\Http\Controllers\Finam;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class TradingBotController extends Controller
{
    private $accessToken = "CAEQwqW7ARoYututz/AooiR0JUgQiLMVDNj9WWOOfNay";

    public function executeBot()
    {
        $symbol = "SBER"; // Символ акции (Apple)
        $timeframe = "D1"; // Временной интервал
        $candles = $this->getDayCandles($symbol, $timeframe);

        if ($candles) {
            dd($candles['data']['candles'][0]);
                $action = $this->analyzeCandles($candles);
            $this->placeOrder($action, $symbol);
            return response()->json(["message" => "Сделка успешно выполнена"], 200);
        } else {
            return response()->json(["error" => "Не удалось получить данные свечей"], 500);
        }
    }

    private function getDayCandles($symbol, $timeframe)
    {
        $response = Http::withHeaders([
            'X-Api-Key' => $this->accessToken
        ])->get("https://trade-api.finam.ru/public/api/v1/day-candles?SecurityBoard=TQBR&SecurityCode=SBER&TimeFrame=D1&Interval.From=2022-05-25&Interval.To=2023-05-25&Interval.Count=100");

        // Проверка успешного получения данных свечей
        if ($response->successful()) {
            return $response->json();
        } else {
            // Вывод ошибки в случае неудачи при получении данных свечей
            dd($response->status(), $response->body());
            return null;
        }
    }

    private function analyzeCandles($candles)
    {
        if ($candles) {
            $lastCandle = end($candles); // Получение последней свечи
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
        // Выполнение сделки или отправка заказа через API Finam
        // И регистрация действия в логе приложения
        Log::info("Выполнение сделки '$action' для актива '$symbol'");
    }
}
