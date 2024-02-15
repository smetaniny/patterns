import React from 'react';
import { Line } from 'react-chartjs-2';
import 'chartjs-adapter-luxon';
import 'chartjs-chart-financial';
import 'chartjs-plugin-streaming';

class CandlestickChart extends React.Component {
    constructor(props) {
        super(props);
        this.chartRef = React.createRef();
    }

    componentDidUpdate() {
        const chart = this.chartRef.current.chartInstance;
        if (chart) {
            chart.data.datasets[0].data = [];
            chart.update();
        }
    }

    onRefresh = chart => {
        const _data = chart.data.datasets[0].data;
        let t = Date.now();
        let last;

        t -= t % 5000;
        if (_data.length === 0) {
            _data.push({x: t - 5000, o: 99, h: 101, l: 98, c: 100});
        }
        last = _data[_data.length - 1];
        if (t !== last.x) {
            const c = last.c;
            last = {x: t, o: c, h: c, l: c, c: c};
            _data.push(last);
        }
        last.c = +(last.c + Utils.rand(-0.5, 0.5)).toFixed(2);
        last.h = +Math.max(last.h, last.c).toFixed(2);
        last.l = +Math.min(last.l, last.c).toFixed(2);
    };

    render() {
        const data = {
            datasets: [{ data: [] }]
        };

        const options = {
            scales: {
                x: {
                    type: 'realtime',
                    ticks: { source: 'auto' },
                    realtime: {
                        duration: 120000,
                        refresh: 500,
                        delay: 0,
                        onRefresh: this.onRefresh
                    }
                }
            },
            interaction: { intersect: false },
            animation: { duration: 0 },
            plugins: { legend: { display: false } }
        };

        return <Line ref={this.chartRef} data={data} options={options} />;
    }
}

export default CandlestickChart;
