
function get_receipt_month_colloction(year = '') {
    var data = {status: 'get_receipt_month_colloction', year: year};
    $.ajax({
        url: base_url + "Home/common",
        data: data,
        async: false,
        type: 'POST',
        success: function (data) {
            var json = jQuery.parseJSON(data);
            var color = ['#FF0F00', '#FF6600', "#FF9E01", "#FCD202", "#F8FF01", "#B0DE09", "#04D215", "#0D8ECF", "#0D52D1", "#2A0CD0", "#8A0CCF", "#CD0D74"];
            var obj = [];
            for (var i = 0; i < json.length; i++) {
                var d = json[i];
                var data = {
                    "country": d.month_name,
                    "visits": d.total,
                    "color": color[i]
                };
                obj.push(data);
            }
            var chart = AmCharts.makeChart("chartdiv", {
                "theme": "light",
                "type": "serial",
                "startDuration": 2,
                "dataProvider": obj,
                "valueAxes": [{
                        "position": "left",
                        "axisAlpha": 0,
                        "gridAlpha": 0
                    }],
                "graphs": [{
                        "balloonText": "[[category]]: <b>[[value]]</b>",
                        "colorField": "color",
                        "fillAlphas": 0.85,
                        "lineAlpha": 0.1,
                        "type": "column",
                        "topRadius": 1,
                        "valueField": "visits"
                    }],
                "depth3D": 40,
                "angle": 30,
                "chartCursor": {
                    "categoryBalloonEnabled": false,
                    "cursorAlpha": 0,
                    "zoomable": false
                },
                "categoryField": "country",
                "categoryAxis": {
                    "gridPosition": "start",
                    "axisAlpha": 0,
                    "gridAlpha": 0

                },
                "export": {
                    "enabled": true
                }

            }, 0);
        }

    });
}
function get_quotation_month_colloction(year = '') {
    var data = {status: 'get_quotation_month_colloction', year: year};
    $.ajax({
        url: base_url + "Home/common",
        data: data,
        async: false,
        type: 'POST',
        success: function (data) {
            var json = jQuery.parseJSON(data);
            var color = ['#FF0F00', '#FF6600', "#FCD202", "#F8FF01", "#B0DE09", "#04D215", "#0D8ECF", "#2A0CD0", "#8A0CCF", "#CD0D74", "#FF9E01", "#0D52D1"];
            var obj = [];
            for (var i = 0; i < json.length; i++) {
                var d = json[i];
                var data = {
                    "country": d.month_name,
                    "visits": d.total,
                    "color": color[i]
                };
                obj.push(data);
            }
            var chart = AmCharts.makeChart("chart2", {
                "theme": "none",
                "type": "serial",
                "startDuration": 2,
                "dataProvider": obj,
                "valueAxes": [{
                        "position": "left",
                        "title": ""
                    }],
                "graphs": [{
                        "balloonText": "[[category]]: <b>[[value]]</b>",
                        "fillColorsField": "color",
                        "fillAlphas": 1,
                        "lineAlpha": 0.1,
                        "type": "column",
                        "valueField": "visits"
                    }],
                "depth3D": 20,
                "angle": 30,
                "chartCursor": {
                    "categoryBalloonEnabled": false,
                    "cursorAlpha": 0,
                    "zoomable": false
                },
                "categoryField": "country",
                "categoryAxis": {
                    "gridPosition": "start",
                    "labelRotation": 90
                },
                "export": {
                    "enabled": true
                }

            });
        }
    });
}

get_receipt_month_colloction();
get_quotation_month_colloction();