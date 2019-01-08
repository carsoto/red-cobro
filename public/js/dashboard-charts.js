// white
var white = 'rgba(255,255,255,1.0)';
var fillBlack = 'rgba(33, 33, 33, 0.6)';
var fillBlackLight = 'rgba(33, 33, 33, 0.2)';
var strokeBlack = 'rgba(33, 33, 33, 0.8)';
var highlightFillBlack = 'rgba(33, 33, 33, 0.8)';
var highlightStrokeBlack = '#212121';

// blue
var fillBlue = 'rgba(33, 150, 243, 0.6)';
var fillBlueLight = 'rgba(33, 150, 243, 0.2)';
var strokeBlue = 'rgba(33, 150, 243, 0.8)';
var highlightFillBlue = 'rgba(33, 150, 243, 0.8)';
var highlightStrokeBlue = '#2196F3';

var fillOrange = 'rgba(237,144,3,0.89)';
var fillYellow = 'rgba(237,200,3,0.89)';

// grey
var fillGrey = 'rgba(158, 158, 158, 0.6)';
var fillGreyLight = 'rgba(158, 158, 158, 0.2)';
var strokeGrey = 'rgba(158, 158, 158, 0.8)';
var highlightFillGrey = 'rgba(158, 158, 158, 0.8)';
var highlightStrokeGrey = '#9e9e9e';

// green
var fillGreen = 'rgba(0, 150, 136, 0.6)';
var fillGreenLight = 'rgba(0, 150, 136, 0.2)';
var strokeGreen = 'rgba(0, 150, 136, 0.8)';
var highlightFillGreen = 'rgba(0, 150, 136, 0.8)';
var highlightStrokeGreen = '#009688';

// purple
var fillPurple = 'rgba(103, 58, 183, 0.6)';
var fillPurpleLight = 'rgba(103, 58, 183, 0.2)';
var strokePurple = 'rgba(103, 58, 183, 0.8)';
var highlightFillPurple = 'rgba(103, 58, 183, 0.8)';
var highlightStrokePurple = '#673AB7';

var randomScalingFactor = function() {
    return Math.round(Math.random() * 100)
};


var barChartDataUno = {
    labels: ['Mes 5', 'Mes 4', 'Mes 3', 'Mes 2', 'Mes 1', 'Mes Actual'],
    datasets: [{
            label: 'Tramo 1',
            borderWidth: 2,
            //borderColor: strokePurple,
            backgroundColor: fillBlue,
            data: ["8954", "9521", "8594", "5847", "5784", "5628"]
        },
        {
            label: 'Tramo 2',
            borderWidth: 2,
            //borderColor: strokeBlack,
            backgroundColor: fillOrange,
            data: ["2345", "2345", "4895", "6345", "5784", "5628"]
        }, {
            label: 'Tramo 3',
            borderWidth: 2,
            //borderColor: strokeBlack,
            backgroundColor: fillGrey,
            data: ["11351", "8875", "14357", "6345", "15256", "15256"]
        }, {
            label: 'Totales',
            borderWidth: 2,
            //borderColor: strokeBlack,
            backgroundColor: fillYellow,
            data: ["22659", "20741", "27846", "28393", "29705", "29846"]
        }
    ]
};

var barChartDataDos = {
    labels: ['Mes 5', 'Mes 4', 'Mes 3', 'Mes 2', 'Mes 1', 'Mes Actual'],
    datasets: [{
            label: 'Tramo 1',
            borderWidth: 2,
            //borderColor: strokePurple,
            backgroundColor: fillBlue,
            data: ["1080399684", "1080399684", "1080399684", "1080399684", "1080399684", "1080399684"]
        },
        {
            label: 'Tramo 2',
            borderWidth: 2,
            //borderColor: strokeBlack,
            backgroundColor: fillOrange,
            data: ["1043332649", "1043332649", "1043332649", "1043332649", "1043332649", "1043332649"]
        }, {
            label: 'Tramo 3',
            borderWidth: 2,
            //borderColor: strokeBlack,
            backgroundColor: fillGrey,
            data: ["4186325870", "4186325870", "4186325870", "4186325870", "4186325870", "4186325870"]
        }, {
            label: 'Totales',
            borderWidth: 2,
            //borderColor: strokeBlack,
            backgroundColor: fillYellow,
            data: ["6310058203", "6310058203", "6310058203", "6310058203", "6310058203", "6310058203"]
        }
    ]
};

function number_format(number, decimals, dec_point, thousands_sep) { 
    number = (number + '').replace(',', '').replace(' ', ''); 
    var n = !isFinite(+number) ? 0 : +number, 
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals), 
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep, 
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point, 
    s = '', 
    toFixedFix = function (n, prec) { 
        var k = Math.pow(10, prec); 
        return '' + Math.round(n * k)/k; 
    }; 

    // Fix for IE parseFloat(0.55).toFixed(0) = 0; 
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.'); 
    if (s[0].length > 3) { 
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep); 
    } 

    if ((s[1] || '').length < prec) { 
        s[1] = s[1] || ''; 
        s[1] += new Array(prec - s[1].length + 1).join('0'); 
    } 
    return s.join(dec); 
} 
var handleChartJs = function() {

    if ($("#asignacion-mensual-rut").length > 0) {
        var ctx2 = document.getElementById('asignacion-mensual-rut').getContext('2d');
        var barChart = new Chart(ctx2, {
            type: 'bar',
            data: barChartDataUno,
            options: {
                title: {
                    display: false,
                    text: ''
                },
                legend: {
                    position: "bottom"
                },
            }
        });
    }

    if ($("#asignacion-mensual-m").length > 0) {
        var ctx2 = document.getElementById('asignacion-mensual-m').getContext('2d');
        var barChart = new Chart(ctx2, {
            type: 'bar',
            data: barChartDataDos,
            options: {
                title: {
                    display: false,
                    text: ''
                },
                legend: {
                    position: "bottom"
                },
                scales: { 
                    yAxes: [{ 
                            ticks: { 
                            beginAtZero:true, 
                            callback: function(value, index, values) { 
                                return '$ ' + number_format(value); 
                            } 
                        } 
                    }] 
                }, 
                tooltips: { 
                    callbacks: { 
                        label: function(tooltipItem, chart){ 
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || ''; 
                            return datasetLabel + ': $ ' + number_format(tooltipItem.yLabel, 2); 
                        } 
                    } 
                } 
            }
        });
    }

    if ($("#historico-casos").length > 0) {
        var ctx2 = document.getElementById('historico-casos').getContext('2d');
        var barChart = new Chart(ctx2, {
            type: 'bar',
            data: barChartDataDos,
            options: {
                title: {
                    display: false,
                    text: ''
                },
                legend: {
                    position: "bottom"
                }
            }
        });
    }
    if ($("#historico-montos").length > 0) {
        var ctx2 = document.getElementById('historico-montos').getContext('2d');
        var barChart = new Chart(ctx2, {
            type: 'bar',
            data: barChartDataDos,
            options: {
                title: {
                    display: false,
                    text: ''
                },
                legend: {
                    position: "bottom"
                },
                scales: { 
                    yAxes: [{ 
                            ticks: { 
                            beginAtZero:true, 
                            callback: function(value, index, values) { 
                                return '$ ' + number_format(value); 
                            } 
                        } 
                    }] 
                }, 
                tooltips: { 
                    callbacks: { 
                        label: function(tooltipItem, chart){ 
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || ''; 
                            return datasetLabel + ': $ ' + number_format(tooltipItem.yLabel, 2); 
                        } 
                    } 
                } 
            }
        });
    }
    if ($("#historico-contactabilidad").length > 0) {
        var ctx2 = document.getElementById('historico-contactabilidad').getContext('2d');
        var barChart = new Chart(ctx2, {
            type: 'bar',
            data: barChartDataDos,
            options: {
                title: {
                    display: false,
                    text: ''
                },
                legend: {
                    position: "bottom"
                }
            }
        });
    }
};

var ChartJs = function() {
    "use strict";
    return {
        //main function
        init: function() {
            handleChartJs();
        }
    };
}();