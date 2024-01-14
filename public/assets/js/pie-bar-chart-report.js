//get chart color form ui
function getChartColorsArray(r) {
    r = $(r).attr("data-colors");
    return (r = JSON.parse(r)).map(function (r) {
        r = r.replace(" ", "");
        if (-1 == r.indexOf("--")) return r;
        r = getComputedStyle(document.documentElement).getPropertyValue(r);
        return r || void 0;
    });
}
function pieChartRender(
    chart_render_body,
    chart_render_id,
    label,
    series,
    colors
) {
    //var piechartColors = getChartColorsArray("#article_groups_pie_chart"),
    const pie_chart_remove = document.getElementById(chart_render_id);
    pie_chart_remove.remove();

    const new_chart = document.createElement("div");

    // ✅ Set Attributes on Element
    new_chart.setAttribute("id", chart_render_id);
    new_chart.setAttribute("class", "apex-charts");

    new_chart.setAttribute("wire:ignore", "");
    new_chart.setAttribute("data-colors", "");
    document.getElementById(chart_render_body).appendChild(new_chart);

    group_pie_chart_options = {
        chart: {
            width: 227,
            height: 227,
            type: "pie",
            id: chart_render_id,
        },
        labels: label,
        series: series,
        colors: colors,
        stroke: {
            width: 0,
        },
        legend: {
            show: !1,
        },
        states: {
            hover: {
                filter: {
                    type: "none",
                },
            },
        },
        tooltip: {
            fill: "black",
            //fillSeriesColor: false,
            style: {
                fontSize: "12px",
                color: "black",
            },
        },
        responsive: [
            {
                // breakpoint: 480,
                options: {
                    chart: {
                        width: 200,
                    },
                },
            },
        ],
    };
    (group_pie_chart = new ApexCharts(
        document.querySelector("#" + chart_render_id),
        group_pie_chart_options
    )).render();
}
function stackBarChartRender(
    chart_render_body,
    chart_render_id,
    series,
    range_series
) {
    //pos revenue this year
    const bar_chart_remove = document.getElementById(chart_render_id);
    bar_chart_remove.remove();

    const new_chart = document.createElement("div");

    // ✅ Set Attributes on Element
    new_chart.setAttribute("id", chart_render_id);
    new_chart.setAttribute("class", "apex-charts");
    new_chart.setAttribute("dir", "ltr");
    new_chart.setAttribute("wire:ignore", "");
    new_chart.setAttribute(
        "data-colors",
        '["#5156be", "#4ba6ef" ,"#fd625e", "#34c38f", "#ffbf53"]'
    );
    document.getElementById(chart_render_body).appendChild(new_chart);
    group_stack_bar_chart_options = {
        title: {
            text: "  ",
        },
        chart: {
            height: 380,
            stacked: true,
            type: "bar",
            id: chart_render_id,
            toolbar: {
                show: !1,
            },
        },
        plotOptions: {
            bar: {
                horizontal: false,
            },
        },
        dataLabels: {
            enabled: !1,
        },
        series: series,
        responsive: [
            {
                breakpoint: 480,
                options: {
                    legend: {
                        position: "bottom",
                        offsetX: -10,
                        offsetY: 0,
                    },
                },
            },
        ],
        stroke: {
            width: 0,
            colors: ["red"],
        },
        legend: {
            show: false,
            position: "top",
            horizontalAlign: "right",
            floating: 0,
            offsetY: 10,
            offsetX: 10,
        },
        fill: {
            opacity: 1,
        },
        states: {
            hover: {
                filter: {
                    type: "none",
                },
            },
        },
        grid: {
            borderColor: "red",
        },
        // tooltip: {
        //     showOnMarkerHover: true,
        //     intersect: false,
        //     shared: true,
        // },
        xaxis: {
            categories: range_series,
        },
    };
    (group_stack_bar_chart = new ApexCharts(
        document.querySelector("#" + chart_render_id),
        group_stack_bar_chart_options
    )).render();
}
