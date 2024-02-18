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
} from 'chart.js';
import { Line } from 'react-chartjs-2';

ChartJS.register(
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Title,
    Tooltip,
    Legend
);

export const options = {
    responsive: true,
    interaction: {
        mode: 'index' ,
        intersect: false,
    },
    stacked: false,
    plugins: {
        title: {
            display: true,
            text: 'Chart.js Line Chart - Multi Axis',
        },
    },
    scales: {
        y: {
            type: 'linear' ,
            display: true,
            position: 'left' ,
        },
        y1: {
            type: 'linear' ,
            display: true,
            position: 'right' ,
            grid: {
                drawOnChartArea: false,
            },
        },
    },
};

const redData = {
    "2024-02-02": 2025.6787787719,
    "2024-02-05": 1699.0099099043,
    "2024-02-06": 1807.0081081035,
    "2024-02-07": 1892.6429975393,
    "2024-02-08": 1967.6169979867,
    "2024-02-09": 2028.4139074436,
    "2024-02-12": 2079.4295606357,
    "2024-02-13": 2110.8060041565,
    "2024-02-14": 1768.2958215826,
    "2024-02-15": 1868.9693085676,
    "2024-02-16": 1959.8839797371
};

const blueData = {
    "2024-02-02": 2025.6787787719,
    "2024-02-05": 1699.0099099043,
    "2024-02-06": 1807.0081081035,
    "2024-02-07": 1892.6429975393,
    "2024-02-08": 1967.6169979867,
    "2024-02-09": 2028.4139074436,
    "2024-02-12": 2079.4295606357,
    "2024-02-13": 2110.8060041565,
    "2024-02-14": 1768.2958215826,
    "2024-02-15": 1868.9693085676,
    "2024-02-16": 2020.8839797371
};



export default function Welcome({redData = {}, blueData = {}}) {
    const data = {
        labels: Object.keys(redData), // Используем ключи из одного из наборов данных
        datasets: [
            {
                label: 'Dataset 1',
                data: Object.values(redData), // Используем значения из набора данных для красной линии
                borderColor: 'rgb(255, 99, 132)',
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                yAxisID: 'y',
            },
            {
                label: 'Dataset 2',
                data: Object.values(blueData), // Используем значения из набора данных для синей линии
                borderColor: 'rgb(53, 162, 235)',
                backgroundColor: 'rgba(53, 162, 235, 0.5)',
                yAxisID: 'y1',
            },
        ],
    };

    return (
        <div>
            <Line options={options} data={data} />
        </div>
    );
}


