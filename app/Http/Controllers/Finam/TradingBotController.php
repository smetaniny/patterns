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
        $intervalFrom = "2022-05-25";
        $intervalTo = "2023-05-25";
        $intervalCount = 100;
        // Обработка данных
        $candles = $this->getDayCandles($symbol, $timeframe, $intervalFrom, $intervalTo, $intervalCount);

        return response()->json($candles);
    }

    private function getDayCandles($symbol, $timeframe, $intervalFrom, $intervalTo, $intervalCount)
    {
        $response = Http::withHeaders([
            'X-Api-Key' => $this->accessToken
        ])->get("https://trade-api.finam.ru/public/api/v1/day-candles?SecurityBoard=TQBR&SecurityCode=$symbol&TimeFrame=$timeframe&Interval.From=$intervalFrom&Interval.To=$intervalTo&Interval.Count=$intervalCount");


        // Проверка успешного получения данных свечей
        if ($response->successful()) {
            return $response->json();
        } else {
            // Вывод ошибки в случае неудачи при получении данных свечей
            dd($response->status(), $response->body());
            return null;
        }
    }
}
