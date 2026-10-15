<!-- start: PAGE TITLE -->
<section id="page-title">
    <div class="row">
        <div class="col-sm-8">
            <h1 class="mainTitle">FORMS - Payment Request - Dashboard</h1>

        </div>
        <ol class="breadcrumb">
            <li>
                <span>Forms</span>
            </li>
            <li>
                <span>Payment Request</span>
            </li>
            <li class="active">
                <span>Dashboard</span>
            </li>
        </ol>
    </div>
</section>
<!-- end: PAGE TITLE -->
<!-- start: YOUR CONTENT HERE -->
<div class="container" >
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-white">
                <div class="panel-heading border-light">
                    <h4 class="panel-title"><span class="text-bold">Form Stats</span></h4>
                    <div class="panel-tools">
                        <a href="#" class="btn btn-transparent btn-sm panel-refresh" data-placement="top" data-toggle="tooltip" data-original-title="Refresh"><i class="ti-reload"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    <div id="chart1" style="width: 100%; height: 300px;"></div>

                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-white">
                <div class="panel-heading border-light">
                    <h4 class="panel-title"><span class="text-bold">High value Payment Requests</span></h4>
                    <div class="panel-tools">
                        <a href="#" class="btn btn-transparent btn-sm panel-refresh" data-placement="top" data-toggle="tooltip" data-original-title="Refresh"><i class="ti-reload"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    <div id="chart2" style="width: 100%; height: 300px;"></div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-white">
                <div class="panel-heading border-light">
                    <h4 class="panel-title"><span class="text-bold">Value Distribution</span></h4>
                    <div class="panel-tools">
                        <a href="#" class="btn btn-transparent btn-sm panel-refresh" data-placement="top" data-toggle="tooltip" data-original-title="Refresh"><i class="ti-reload"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    <div id="chart3" style="width: 100%; height: 500px;"></div>

                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-white">
                <div class="panel-heading border-light">
                    <h4 class="panel-title"><span class="text-bold">Form Value Trend</span></h4>
                    <div class="panel-tools">
                        <a href="#" class="btn btn-transparent btn-sm panel-refresh" data-placement="top" data-toggle="tooltip" data-original-title="Refresh"><i class="ti-reload"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    <div id="chart4" style="width: 100%; height: 500px;"></div>

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    jQuery(document).ready(function () {
        var chart = AmCharts.makeChart("chart1", {
            "type": "funnel",
            "responsive": {
                "enabled": true
            },
            "theme": "light",
            "dataProvider": [{
                    "title": "Froms Raised",
                    "value": 400
                }, {
                    "title": "Forms Approved",
                    "value": 123
                }, {
                    "title": "Forms Rejected",
                    "value": 45
                }, {
                    "title": "Pending for approval",
                    "value": 72
                }],
            "balloon": {
                "fixedPosition": true
            },
            "valueField": "value",
            "titleField": "title",
            "marginRight": 240,
            "marginLeft": 50,
            "startX": -500,
            "depth3D": 100,
            "angle": 40,
            "outlineAlpha": 1,
            "outlineColor": "#FFFFFF",
            "outlineThickness": 2,
            "labelPosition": "right",
            "balloonText": "[[title]]: [[value]]",
            "export": {
                "enabled": true
            }
        });
        var chart = AmCharts.makeChart("chart2", {
            "type": "serial",
            "theme": "light",
            "handDrawScatter": 3,
            "legend": {
                "useGraphSettings": true,
                "markerSize": 12,
                "valueWidth": 0,
                "verticalGap": 0
            },
            "dataProvider": [{
                    "cat": "Ahmed Kamil",
                    "income": 6000
                }, {
                    "cat": "Rayyan Bilawal",
                    "income": 8000
                }, {
                    "cat": "Alex Martin",
                    "income": 3300
                }, {
                    "cat": "Someone",
                    "income": 2800
                }, {
                    "cat": "No one",
                    "income": 8800
                }, {
                    "cat": "Others",
                    "income": 2233
                }],
            "valueAxes": [{
                    "minorGridAlpha": 0.08,
                    "minorGridEnabled": true,
                    "position": "top",
                    "axisAlpha": 0
                }],
            "startDuration": 1,
            "graphs": [{
                    "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b></span>",
                    "title": "Range",
                    "type": "column",
                    "fillAlphas": 0.8,
                    "valueField": "income"
                }],
            "rotate": true,
            "categoryField": "cat",
            "categoryAxis": {
                "gridPosition": "start"
            },
            "export": {
                "enabled": true
            }

        });
        var chart = AmCharts.makeChart("chart3", {
            "type": "pie",
            "theme": "light",
            "dataProvider": [{
                    "cat": "> USD 10,000",
                    "income": 8

                }, {
                    "cat": "USD 8,000 - 10,000",
                    "income": 7

                }, {
                    "cat": "USD 7,000 - 8,000",
                    "income": 22

                }, {
                    "cat": "USD 6,000-7,000",
                    "income": 38

                }, {
                    "cat": "< USD 6,000",
                    "income": 42

                }],
            "valueField": "income",
            "titleField": "cat",
            "startEffect": "elastic",
            "startDuration": 1,
            "labelRadius": 15,
            "innerRadius": "20%",
            "depth3D": 10,
            "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
            "angle": 15,
            "export": {
                "enabled": true
            }
        });
        var chart = AmCharts.makeChart("chart4", {
            "type": "serial",
            "theme": "light",
            "marginRight": 80,
            "autoMarginOffset": 20,
            "dataDateFormat": "YYYY-MM-DD HH:NN",
            "dataProvider": [{
                    "date": "2012-01-01",
                    "value": 3000
                }, {
                    "date": "2012-01-01",
                    "value": 4500
                }, {
                    "date": "2012-01-02",
                    "color": "#CC0000",
                    "value": 6800
                }, {
                    "date": "2012-01-03",
                    "value": 9354
                }, {
                    "date": "2012-01-04",
                    "value": 2560
                }, {
                    "date": "2012-01-05",
                    "value": 1361
                }, {
                    "date": "2012-01-06",
                    "value": 4265
                }, {
                    "date": "2012-01-07",
                    "value": 8955
                }, {
                    "date": "2012-01-08",
                    "value": 9621
                }, {
                    "date": "2012-01-09",
                    "value": 3365
                }, {
                    "date": "2012-01-10",
                    "value": 4283
                }, {
                    "date": "2012-01-11",
                    "color": "#CC0000",
                    "value": 4568
                }, {
                    "date": "2012-01-12",
                    "value": 9223
                }, {
                    "date": "2012-01-13",
                    "value": 4885
                }, {
                    "date": "2012-01-14",
                    "value": 6678
                }, {
                    "date": "2012-01-15",
                    "value": 1378
                }, {
                    "date": "2012-01-16",
                    "value": 12345
                }, {
                    "date": "2012-01-17",
                    "color": "#CC0000",
                    "value": 4479
                }, {
                    "date": "2012-01-18",
                    "value": 6870
                }, {
                    "date": "2012-01-19",
                    "value": 3345
                }, {
                    "date": "2012-01-20",
                    "value": 1789
                }, {
                    "date": "2012-01-21",
                    "value": 1900
                }, {
                    "date": "2012-01-22",
                    "color": "#CC0000",
                    "value": 4578
                }, {
                    "date": "2012-01-23",
                    "value": 5677
                }],
            "valueAxes": [{
                    "axisAlpha": 0,
                    "guides": [{
                            "fillAlpha": 0.1,
                            "fillColor": "#888888",
                            "lineAlpha": 0,
                            "toValue": 16,
                            "value": 10
                        }],
                    "position": "left",
                    "tickLength": 0
                }],
            "graphs": [{
                    "balloonText": "[[category]]<br><b><span style='font-size:14px;'>value:[[value]]</span></b>",
                    "bullet": "round",
                    "dashLength": 3,
                    "colorField": "color",
                    "valueField": "value"
                }],
            "trendLines": [{
                    "finalDate": "2012-01-23 12",
                    "finalValue": 3000,
                    "initialDate": "2012-01-02 12",
                    "initialValue": 6000,
                    "lineColor": "#CC0000"
                }],
            "chartScrollbar": {
                "scrollbarHeight": 2,
                "offset": -1,
                "backgroundAlpha": 0.1,
                "backgroundColor": "#888888",
                "selectedBackgroundColor": "#67b7dc",
                "selectedBackgroundAlpha": 1
            },
            "chartCursor": {
                "fullWidth": true,
                "valueLineEabled": true,
                "valueLineBalloonEnabled": true,
                "valueLineAlpha": 0.5,
                "cursorAlpha": 0
            },
            "categoryField": "date",
            "categoryAxis": {
                "parseDates": true,
                "axisAlpha": 0,
                "gridAlpha": 0.1,
                "minorGridAlpha": 0.1,
                "minorGridEnabled": true
            },
            "export": {
                "enabled": true
            }
        });

    });
</script>