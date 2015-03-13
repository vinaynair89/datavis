<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Highcharts Pie Chart</title>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    </head>
        <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
            var options = {
                chart: {
                    renderTo: 'container',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                },
                title: {
                    text: 'Cost in percentage according to quarter'
                },
                tooltip: {
                    formatter: function() {
                        return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
                        console.log(this.point);
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            color: '#000000',
                            connectorColor: '#000000',
                            formatter: function() {
                                return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
                            }
                        }
                    }
                },
                series: [{
                    type: 'pie',
                    name: 'Browser share',
                    data: []
                }]
            }
            console.log(this.point);
            $.getJSON("data.php", function(json) {
                options.series[0].data = json;
                chart = new Highcharts.Chart(options);
            });
            
            
            
        });   
        </script>
        <script src="js/highcharts.js"></script>
        <script src="http://code.highcharts.com/modules/exporting.js"></script>
    </head>
    <body>
        <div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
        <a href="index2.php"><button type="button" class="btn btn-success">Next</button></a>
    </body>
</html>