<template>
    <canvas id="daily-report-chart"></canvas>
</template>

<script setup>
import { Chart } from 'chart.js/auto'
import { onMounted } from 'vue'

const props = defineProps({
    dailyData: Object,
})

onMounted(() => {
    let delayed
    const dailyReportChart = document.getElementById('daily-report-chart').getContext('2d')
    new Chart(dailyReportChart, {
        type: 'bar',
        data: {
            labels: Object.keys(props.dailyData),
            datasets: [
                {
                    label: 'Appointment Type',
                    data: Object.values(props.dailyData),
                    backgroundColor: '#1B59F8',
                    borderColor: '#1B59F8',
                    borderWidth: 1,
                    borderRadius: 10,
                    spanGaps: true,
                    barThickness: 30,
                    borderSkipped: 'middle',
                    hoverBackgroundColor: '#377DFF',
                    hoverBorderColor: '#377DFF',
                },
            ],
        },
        options: {
            animation: {
                onComplete: () => {
                    delayed = true
                },
                delay: (context) => {
                    let delay = 0;
                    if (context.type === 'data' && context.mode === 'default' && !delayed) {
                        delay = context.dataIndex * 300 + context.datasetIndex * 100;
                    }
                    return delay;
                },
            },
            plugins: {
                legend: false,
                decimation: true,
            },
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    precision: 0,
                    grid: {
                        display: true,
                    }
                },
                x: {
                    grid: {
                        display: false,
                    },
                }
            },
        },
    })
})
</script>