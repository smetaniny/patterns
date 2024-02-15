import React, { Component } from 'react';
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
import { Line } from 'react-chartjs-2';
import 'chartjs-plugin-streaming';
ChartJS.register(
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Title,
    Tooltip,
    Legend
)

class RealtimeChart extends Component {
    constructor(props) {
        super(props);
        this.state = {
            chartData: {
                datasets: [{
                    label: 'Dataset 1',
                    borderColor: 'rgb(255, 99, 132)',
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    lineTension: 0,
                    borderDash: [8, 4],
                    data: []
                }, {
                    label: 'Dataset 2',
                    borderColor: 'rgb(54, 162, 235)',
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    data: []
                }]
            }
        };
    }

    componentDidMount() {
        this.addRandomData();
    }

    addRandomData = () => {
        setInterval(() => {
            const { chartData } = this.state;
            chartData.datasets.forEach(dataset => {
                dataset.data.push({
                    x: Date.now(),
                    y: Math.random()
                });
            });
            this.setState({ chartData });
        }, 2000);
    };

    render() {
        return (
            <div className="chart-container">
                <Line
                    data={this.state.chartData}
                    options={{
                        scales: {
                            xAxes: [{
                                type: 'realtime',
                                realtime: {
                                    delay: 2000,
                                    onRefresh: chart => {
                                        chart.data.datasets.forEach(dataset => {
                                            dataset.data.push({
                                                x: Date.now(),
                                                y: Math.random()
                                            });
                                        });
                                    }
                                }
                            }]
                        }
                    }}
                />
            </div>
        );
    }
}

export default RealtimeChart;
