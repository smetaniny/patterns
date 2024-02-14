import React from 'react';
import { Chart } from 'react-chartjs-2';

const MyChart = () => {
    const data = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [
            {
                label: 'My First Dataset',
                data: [65, 59, 80, 81, 56, 55, 40],
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
