var EcommerceDashboard = function() {

    function showTooltip(x, y, labelX, labelY) {
        $('<div id="tooltip" class="chart-tooltip">' + (labelY.toFixed(1).replace(/(\d)(?=(\d{3})+\.)/g, '$1,')) + ' đ<\/div>').css({
            position: 'absolute',
            display: 'none',
            top: y - 40,
            left: x - 60,
            border: '0px solid #ccc',
            padding: '2px 6px',
            'background-color': '#fff'
        }).appendTo("body").fadeIn(200);
    }

    var initChart1 = function() {

        var data = [
            ['01/2020', 30000000],
            ['02/2020', 25000000],
            ['03/2020', 35000000],
            ['04/2020', 40000000],
            ['05/2020', 45000000],
            ['06/2020', 50000000],
            ['07/2020', 60000000],
            ['08/2020', 70000000],
            ['09/2020', 85000000],
            ['10/2020', 90000000],
            ['11/2020', 100000000],
        ];

        var plot_statistics = $.plot(
            $("#statistics_1"), [{
                data: data,
                lines: {
                    fill: 0.6,
                    lineWidth: 0
                },
                color: ['#f89f9f']
            }, {
                data: data,
                points: {
                    show: true,
                    fill: true,
                    radius: 5,
                    fillColor: "#f89f9f",
                    lineWidth: 3
                },
                color: '#fff',
                shadowSize: 0
            }], {

                xaxis: {
                    tickLength: 0,
                    tickDecimals: 0,
                    mode: "categories",
                    min: 2,
                    font: {
                        lineHeight: 15,
                        style: "normal",
                        variant: "small-caps",
                        color: "#6F7B8A"
                    }
                },
                yaxis: {
                    ticks: 3,
                    tickDecimals: 0,
                    tickColor: "#f0f0f0",
                    font: {
                        lineHeight: 15,
                        style: "normal",
                        variant: "small-caps",
                        color: "#6F7B8A"
                    }
                },
                grid: {
                    backgroundColor: {
                        colors: ["#fff", "#fff"]
                    },
                    borderWidth: 1,
                    borderColor: "#f0f0f0",
                    margin: 0,
                    minBorderMargin: 0,
                    labelMargin: 20,
                    hoverable: true,
                    clickable: true,
                    mouseActiveRadius: 6
                },
                legend: {
                    show: false
                }
            }
        );

        var previousPoint = null;

        $("#statistics_1").bind("plothover", function(event, pos, item) {
            $("#x").text(pos.x.toFixed(2));
            $("#y").text(pos.y.toFixed(2));
            if (item) {
                if (previousPoint != item.dataIndex) {
                    previousPoint = item.dataIndex;

                    $("#tooltip").remove();
                    var x = item.datapoint[0].toFixed(2),
                        y = item.datapoint[1].toFixed(2);

                    showTooltip(item.pageX, item.pageY, item.datapoint[0], item.datapoint[1]);
                }
            } else {
                $("#tooltip").remove();
                previousPoint = null;
            }
        });

    }

    var initChart2 = function() {

        var data = [
            ['01/2020', 30000000],
            ['02/2020', 25000000],
            ['03/2020', 35000000],
            ['04/2020', 40000000],
            ['05/2020', 45000000],
            ['06/2020', 50000000],
            ['07/2020', 60000000],
            ['08/2020', 70000000],
            ['09/2020', 85000000],
            ['10/2020', 90000000],
            ['11/2020', 100000000],
        ];

        var plot_statistics = $.plot(
            $("#statistics_2"), [{
                data: data,
                lines: {
                    fill: 0.6,
                    lineWidth: 0
                },
                color: ['#BAD9F5']
            }, {
                data: data,
                points: {
                    show: true,
                    fill: true,
                    radius: 5,
                    fillColor: "#BAD9F5",
                    lineWidth: 3
                },
                color: '#fff',
                shadowSize: 0
            }], {

                xaxis: {
                    tickLength: 0,
                    tickDecimals: 0,
                    mode: "categories",
                    min: 2,
                    font: {
                        lineHeight: 14,
                        style: "normal",
                        variant: "small-caps",
                        color: "#6F7B8A"
                    }
                },
                yaxis: {
                    ticks: 3,
                    tickDecimals: 0,
                    tickColor: "#f0f0f0",
                    font: {
                        lineHeight: 14,
                        style: "normal",
                        variant: "small-caps",
                        color: "#6F7B8A"
                    }
                },
                grid: {
                    backgroundColor: {
                        colors: ["#fff", "#fff"]
                    },
                    borderWidth: 1,
                    borderColor: "#f0f0f0",
                    margin: 0,
                    minBorderMargin: 0,
                    labelMargin: 20,
                    hoverable: true,
                    clickable: true,
                    mouseActiveRadius: 6
                },
                legend: {
                    show: false
                }
            }
        );

        var previousPoint = null;

        $("#statistics_2").bind("plothover", function(event, pos, item) {
            $("#x").text(pos.x.toFixed(2));
            $("#y").text(pos.y.toFixed(2));
            if (item) {
                if (previousPoint != item.dataIndex) {
                    previousPoint = item.dataIndex;

                    $("#tooltip").remove();
                    var x = item.datapoint[0].toFixed(2),
                        y = item.datapoint[1].toFixed(2);

                    showTooltip(item.pageX, item.pageY, item.datapoint[0], item.datapoint[1]);
                }
            } else {
                $("#tooltip").remove();
                previousPoint = null;
            }
        });

    }

    return {

        //main function
        init: function() {
            initChart1();

            $('#statistics_orders_tab').on('shown.bs.tab', function(e) {
                initChart2();
            });
        }

    };

}();

jQuery(document).ready(function() {    
   EcommerceDashboard.init();
});