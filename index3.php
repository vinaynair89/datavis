<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Bar chart with data from MySQL using Highcharts</title>
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
                    type: 'bar'
                },
                colors: ['#7cb5ec'],
                title: {
                    text: 'Project Requests',
                    x: -20 //center
                },
                subtitle: {
                    text: '',
                    x: -20
                },
                xAxis: {
                    title: 'Quarters',
                    categories: []
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Costs'
                    },
                    labels: {
                        overflow: 'justify'
                    }
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
                    bar: {
                        dataLabels: {
                            enabled: true
                        }
                    },
                    color: '#FF0000'
                },
                series: []
            }
            
            $.getJSON("data3.php", function(json) {
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
        <div id="container" style="min-width: 400px; height: 800px; margin: 0 auto"></div>
        <a href="index4.php"><button type="button" class="btn btn-success">Next</button></a>
        <a href="index2.php" class="right"><button type="button" class="btn btn-success">Prev</button></a>
    </body>
</html>