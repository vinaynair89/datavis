<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Stacked area chart with data from MySQL using Highcharts</title>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    </head>
    <style>
    .right {
    text-align: right;
    float: right;
	}
    </style>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
            var options = {
                chart: {
                    renderTo: 'container',
                    type: 'area',
                    backgroundColor: '#F5F823',
                    borderColor: '#FA0740', 
                    marginRight: 130,
                    marginBottom: 25
                },
                title: {
                    text: 'Project Requests',
                    x: -20 //center
                },
                subtitle: {
                    text: '',
                    x: -20
                },
                xAxis: {
                    categories: []
                },
                yAxis: {
                    title: {
                        text: 'Quantity'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#FA0740'
                    }]
                },
                tooltip: {
                    formatter: function() {
                            return '<b>'+ this.series.name +'</b><br/>'+
                            this.x +': '+ this.y;
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'top',
                    x: -10,
                    y: 100,
                    borderWidth: 0
                },
                plotOptions: {
                    area: {
                        stacking: 'normal',
                        lineColor: '#666666',
                        lineWidth: 1,
                        marker: {
                            lineWidth: 1,
                            lineColor: '#666666'
                        }
                    }
                },
                series: []
            }
            
            $.getJSON("data4.php", function(json) {
            options.xAxis.categories = json[0]['data'];
                options.series[0] = json[1];
                /*options.series[1] = json[2];
                options.series[2] = json[3];*/
                chart = new Highcharts.Chart(options);
            });
        });
        </script>
        <script src="http://code.highcharts.com/highcharts.js"></script>
        <script src="http://code.highcharts.com/modules/exporting.js"></script>
    </head>
    <body>
        <div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
        <a href="index5.php"><button type="button" class="btn btn-success">Next</button></a>
        <a href="index3.php" class="right"><button type="button" class="btn btn-success">Prev</button></a>
    </body>
</html>