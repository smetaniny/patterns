<?php

namespace App\Http\Controllers\Finam;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;

class TradingBotController extends Controller
{
    private $accessToken = "CAEQwqW7ARoYututz/AooiR0JUgQiLMVDNj9WWOOfNay";
//    private $accessToken = "CAEQxKW7ARoYrij8j7RgG9H/cQFJ1EOfoA5aUrUGm2n2";

    public function executeBot()
    {
        $symbol = "AAPL"; // ������ ������� ����� (Apple)
        $timeframe = "D1"; // ������� ���������
        $candles = $this->getDayCandles($symbol, $timeframe);

        if ($candles) {
            $action = $this->analyzeCandles($candles);
            $this->placeOrder($action, $symbol);
            return response()->json(["message" => "��� ������� ��������"], 200);
        } else {
            return response()->json(["error" => "�� ������� �������� ������ ������"], 500);
        }
    }

    private function getDayCandles($symbol, $timeframe)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->accessToken
        ])->get("https://trade-api.finam.ru/api/v1/access-tokens/check");

        // �������� ���������� ���������� �������
        if ($response->successful()) {
            return $response->json();
        } else {
            // ����� ���������� �� ������ � ������ ���������� �������
            dd($response->status(), $response->body());
            return null;
        }
    }

    private function analyzeCandles($candles)
    {
        if ($candles) {
            $lastCandle = end($candles); // ����� ��������� �����
            $openPrice = $lastCandle['o']; // ���� ��������
            $closePrice = $lastCandle['c']; // ���� ��������
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
        // ����� ������ ���� ��� ��� �������� ������, ��������� API Finam
        // � ������ ������� ������ ������� ���������
        \Log::info("��������� �������� '$action' ��� ����������� '$symbol'");
    }
}

