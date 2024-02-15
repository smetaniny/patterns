import React from 'react';
import {
    Chart as ChartJS,
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Title,
    Tooltip,
    Legend,
} from 'chart.js'
import { Chart } from 'react-chartjs-2'

ChartJS.register(
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Title,
    Tooltip,
    Legend
)

const MyChart = () => {
    const candles = [
        {
            date: "2022-05-25",
            open: {
                num: 12412,
                scale: 2
            },
            close: {
                num: 12415,
                scale: 2
            },
            high: {
                num: 1255,
                scale: 1
            },
            low: {
                num: 1205,
                scale: 1
            },
            volume: 53466830
        },
        {
            date: "2022-05-26",
            open: {
                num: 12481,
                scale: 2
            },
            close: {
                num: 123,
                scale: 0
            },
            high: {
                num: 12599,
                scale: 2
            },
            low: {
                num: 122,
                scale: 0
            },
            volume: 51897210
        }
    ];

    // Создаем массив меток и данных из массива свечей
    const labels = candles.map(candle => candle.date);
    const datasetData = candles.map(candle => candle.close.num);

    const data = {
        labels: labels,
        datasets: [
            {
                label: 'Close Price',
                data: datasetData,
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }
        ]
    };

    const options = {
        scales: {
            x: {
                type: 'category'
            }
        }
    };

    return (
        <Chart
            type="line"
            data={data}
            options={options}
        />
    );
};

export default MyChart;
