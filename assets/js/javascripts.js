Highcharts.chart("container", {
    chart: {
        type: "column",
    },
    title: {
        text: " ",
    },
    xAxis: {
        categories: [
            "شنبه",
            "یک شنبه",
            "دو شنبه",
            "سه شنبه",
            "چهار شنبه",
            "پنج شنبه",
            "جمعه",
        ],
        crosshair: true,
    },
    yAxis: {
        min: 0,
        title: {
            text: "قیمت (تومان)",
        },
    },
    tooltip: false,
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0,
        },
    },
    series: [{
        name: "Average",
        data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0],
    }, ],
});