<?php

namespace App\Http\Controllers\Finam;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class TradingBotController extends Controller
{
    private $accessToken = "CAEQwqW7ARoYututz/AooiR0JUgQiLMVDNj9WWOOfNay";
//    private $accessToken = "CAEQwqW7ARoYututz/AooiR0JUgQiLMVDNj9WWOOfNay";

    public function executeBot()
    {
        $securityBoard = "FUT"; // Символ акции (Apple)
        $symbol = "SVH4"; // Символ акции (Apple)
        $timeframe = "D1"; // Временной интервал
        $intervalFrom = "2024-01-15";
        $intervalTo = "2024-02-16";
        $intervalCount = 100;
        // Обработка данных
        $candles = $this->getDayCandles($symbol, $timeframe, $intervalFrom, $intervalTo, $intervalCount, $securityBoard);

        // Рассчитываем скользящее среднее для закрытых цен за 10 дней
//        $movingAverage = $this->calculateMovingAverage($candles, 10);
        $calculateEMA10 = $this->calculateEMA($candles, 10);
        $calculateEMA40 = $this->calculateEMA($candles, 40);
       dd( $this->findCrossOvers($calculateEMA10, $calculateEMA40));

        return response()->json($candles);
    }

    private function getDayCandles($symbol, $timeframe, $intervalFrom, $intervalTo, $intervalCount, $securityBoard)
    {
        $response = Http::withHeaders([
            'X-Api-Key' => $this->accessToken
        ])->get("https://trade-api.finam.ru/public/api/v1/day-candles?SecurityBoard=$securityBoard&SecurityCode=$symbol&TimeFrame=$timeframe&Interval.From=$intervalFrom&Interval.To=$intervalTo&Interval.Count=$intervalCount");
dd($response->json());
//        $response = Http::withHeaders([
//            'X-Api-Key' => $this->accessToken
//        ])->get("https://trade-api.finam.ru/public/api/v1/securities");
        // Проверка успешного получения данных свечей
        if ($response->successful()) {
            return $response->json();
        } else {
            // Вывод ошибки в случае неудачи при получении данных свечей
            dd($response->status(), $response->body());
            return null;
        }
    }

    private function calculateMovingAverage($candles, $period)
    {
        // Извлекаем закрытые цены из массива свечей
        $closePrices = array_column($candles['data']['candles'], 'close', 'date');
        $movingAverage = [];

        // Получаем ключи (даты) и значения (цены) закрытых цен
        $dates = array_keys($closePrices);
        $prices = array_values($closePrices);

        // Вычисляем скользящее среднее для каждой точки данных
        for ($i = $period - 1; $i < count($prices); $i++) {
            $sum = 0;
            for ($j = $i; $j > $i - $period; $j--) {
                $sum += $prices[$j]['num'];
            }
            $movingAverage[$dates[$i]] = $sum / $period;
        }

        dd($movingAverage);

        return $movingAverage;
    }

    private function calculateEMA($candles, $period)
    {
        $closePrices = [];
        foreach ($candles['data']['candles'] as $candle) {
            dd($candle);
            $closePrices[$candle['date']] = $candle['close']['num'];
        }
        $ema = [];

        // Находим первую доступную дату и устанавливаем ее значение цены закрытия в качестве начального значения EMA
        $firstDate = array_key_first($closePrices);
        $ema[$firstDate] = $closePrices[$firstDate];

        // Рассчет коэффициента сглаживания
        $alpha = 2 / ($period + 1);

        // Вычисление EMA для каждого последующего дня
        $dates = array_keys($closePrices);
        for ($i = 1; $i < count($dates); $i++) {
            $currentDate = $dates[$i];
            // Рассчитываем EMA используя предыдущее значение EMA и текущую цену
            $ema[$currentDate] = ($closePrices[$currentDate] - $ema[$dates[$i - 1]]) * $alpha + $ema[$dates[$i - 1]];
        }

        dd($ema);
        return $ema;
    }

    private function findCrossOvers($ema10, $ema40)
    {
        // Получаем список дат, которые есть в обоих массивах
        $dates = array_intersect(array_keys($ema10), array_keys($ema40));

        // Инициализируем массив для хранения дат пересечений
        $crossOvers = [];

        // Проходимся по каждой дате
        foreach ($dates as $date) {
            // Проверяем пересечение EMA 10 и EMA 40 для текущей даты
            if ($ema10[$date] > $ema40[$date]) {
                // EMA 10 пересекла EMA 40 снизу вверх
                $crossOvers[$date] = 'EMA 10 пересекла EMA 40 снизу вверх';
            } elseif ($ema10[$date] < $ema40[$date]) {
                // EMA 10 пересекла EMA 40 сверху вниз
                $crossOvers[$date] = 'EMA 10 пересекла EMA 40 сверху вниз';
            }
        }

        return $crossOvers;
    }



}
