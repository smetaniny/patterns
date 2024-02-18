<?php

namespace App\Http\Controllers\Finam;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class TradingBotController extends Controller
{
    private string $accessToken = "CAEQwqW7ARoYututz/AooiR0JUgQiLMVDNj9WWOOfNay";

    public function executeBot()
    {
        $securityBoard = "FUT"; // Символ акции (Apple)
        $symbol = "SVH4"; // Символ акции (Apple)
        $timeframe = "H1"; // Временной интервал
        $intervalCount = 100000;

        // Получаем текущую дату
        $currentDate = date('Y-m-d');
        // Получаем дату 30 дней назад от текущей даты
        $thirtyDaysAgo = date('Y-m-d', strtotime('-10 days', strtotime($currentDate)));

        // Используем полученные даты как интервал
        $intervalFrom = $thirtyDaysAgo;
        $intervalTo = $currentDate;


        // Обработка данных
        $candles = $this->getDayCandles($symbol, $timeframe, $intervalFrom, $intervalTo, $intervalCount, $securityBoard);

        $calculateEMA10 = $this->calculateEMA($candles, 10);
        $calculateEMA40 = $this->calculateEMA($candles, 40);
        return Inertia::render('Welcome', [
            'redData' => $calculateEMA10,
            'blueData' => $calculateEMA40,
        ]);
    }


    private function getDayCandles($symbol, $timeframe, $intervalFrom, $intervalTo, $intervalCount, $securityBoard)
    {
        $response = Http::withHeaders([
            'X-Api-Key' => $this->accessToken
        ])->get("https://trade-api.finam.ru/public/api/v1/intraday-candles?SecurityBoard=$securityBoard&SecurityCode=$symbol&TimeFrame=$timeframe&Interval.From=$intervalFrom&Interval.To=$intervalTo&Interval.Count=$intervalCount");

        if ($response->successful()) {
            return $response->json();
        } else {
            // Вывод ошибки в случае неудачи при получении данных свечей
            dd($response->status(), $response->body());
            return null;
        }
    }

    private function calculateEMA($candles, $period)
    {
        $closePrices = [];
        $dates = [];


        // Проверка наличия данных о свечах
        if (!isset($candles['data']['candles']) || !is_array($candles['data']['candles'])) {
            return []; // Возвращаем пустой массив, если данные отсутствуют или имеют неправильный формат
        }

        foreach ($candles['data']['candles'] as $candle) {
            // Проверка наличия необходимых данных в свече
            if (!isset($candle['timestamp'], $candle['close']['num'])) {
                continue; // Пропускаем эту свечу, если отсутствует необходимая информация
            }

            $dates[] = $candle['timestamp'];
            $closePrices[] = $candle['close']['num'] / 100;
        }

        $ema = [];
        $count = count($closePrices);

        // Проверка, достаточно ли данных для расчета EMA
        if ($count < $period) {
            return []; // Возвращаем пустой массив, если данных недостаточно для расчета EMA
        }

        $multiplier = 2 / ($period + 1); // Вычисляем множитель взвешивания

        // Шаг 1: Рассчитываем начальное простое скользящее среднее (SMA)
        $sma = array_sum(array_slice($closePrices, 0, $period)) / $period;

        // Заполняем начальные значения EMA
        for ($i = 0; $i < $period; $i++) {
            $ema[$dates[$i]] = $closePrices[$i];
        }

        // Шаг 3: Рассчитываем EMA для последующих дней
        for ($i = $period; $i < $count; $i++) {
            // Проверяем, есть ли данные для предыдущей даты
            if (isset($ema[$dates[$i - 1]])) {
                // Рассчитываем EMA с использованием формулы
                $emaValue = ($closePrices[$i] - $ema[$dates[$i - 1]]) * $multiplier + $ema[$dates[$i - 1]];
                // Сохраняем рассчитанное значение EMA с соответствующей датой
                $ema[$dates[$i]] = $emaValue;
            } else {
                // Если данные для предыдущей даты отсутствуют, пропускаем эту итерацию
                continue;
            }
        }

        return $ema;
    }
}
