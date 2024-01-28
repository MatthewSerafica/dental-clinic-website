<template>
    <canvas id="yearly-report-chart"></canvas>
</template>

<script setup>
import { Chart } from 'chart.js/auto';
import { onMounted } from 'vue';

const props = defineProps({
    yearlyData: Object,
})


onMounted(() => {
    let delayed
    const yearlyReportChart = document.getElementById('yearly-report-chart')
    new Chart(yearlyReportChart, {
        data: {
            labels: Object.keys(props.yearlyData),
            datasets: [
                {
                    type: 'bar',
                    label: 'Patients Accomodated',
                    data: Object.values(props.yearlyData),
                    backgroundColor: '#1B59F8',
                    borderColor: '#1B59F8',
                    borderWidth: 1,
                    borderRadius: 50,
                    spanGaps: true,
                    borderSkipped: 'middle',
                    barThickness: 20,
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
                        display: false,
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