// performance chart

$( document ).ready(function() { // 6,32 5,38 2,34
    $("#test-circle").circliful({
        animation: 1,
        animationStep: 5,
        animateInView: true,
        foregroundBorderWidth: 15,
        backgroundBorderWidth: 15,
        percent: 40,
        textSize: 28,
        textStyle: 'font-size: 12px;',
        textColor: '#666',
        progressColor: {20: '#f00', 40: '#FA6C00', 60: '#000', 80: '#0C8AE1', 100: '#00C259'}
    });
    
    $("#test-circle2").circliful({
        animation: 1,
        animationStep: 5,
        percent: 60,
        textSize: 28,
        textStyle: 'font-size: 12px;',
        textColor: '#666',
        progressColor: {20: '#CC9487', 40: '#FA6C00', 60: '#000', 80: '#0C8AE1', 100: '#00C259'}
    });
    $("#test-circle3").circliful({
        animation: 1,
        animationStep: 5,
        percent: 80,
        textSize: 28,
        textStyle: 'font-size: 12px;',
        textColor: '#666',
        progressColor: {20: '#CC9487', 40: '#FA6C00', 60: '#000', 80: '#0C8AE1', 100: '#00C259'}
    });
});


// transaction chart
var lineChartData = {
    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    datasets: [{
        label: 'Income',
        borderColor: window.chartColors.red,
        backgroundColor: window.chartColors.red,
        fill: false,
        data: [
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor()
        ],
        yAxisID: 'y-axis-1',
    }, {
        label: 'Expenses',
        borderColor: window.chartColors.green,
        backgroundColor: window.chartColors.green,
        fill: false,
        data: [
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor()
        ],
        yAxisID: 'y-axis-2'
    }]
};
window.onload = function() {
    var ctx = document.getElementById('canvas').getContext('2d');
    window.myLine = Chart.Line(ctx, {
        data: lineChartData,
        options: {
            responsive: true,
            hoverMode: 'index',
            stacked: false,
            title: {
                display: true,
                // text: 'Chart.js Line Chart - Multi Axis'
            },
            scales: {
                yAxes: [{
                    type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                    display: true,
                    position: 'left',
                    id: 'y-axis-1',
                }, {
                    type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                    display: true,
                    position: 'right',
                    id: 'y-axis-2',
                    // grid line settings
                    gridLines: {
                        drawOnChartArea: false, // only want the grid lines for one axis to show up
                    },
                }],
            }
        }
    });
};

/*==================
sales dashboard
====================*/
// sales chart
    var ctx = document.getElementById('canvasSale').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
            label: "Sales",
            backgroundColor: 'transparent',
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 30, 45],
        }]
    },

    // Configuration options go here
    options: {}
});