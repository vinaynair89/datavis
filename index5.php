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
    var chart;
            $(document).ready(function() {
                var options = {
                    chart: {
                        renderTo: 'container',
                        defaultSeriesType: 'line',
                        marginRight: 130,
                        marginBottom: 25
                    },
                    title: {
                        text: 'Total Cost of all order for 2014',
                        x: -20 //center
                    },
                    subtitle: {
                        text: '',
                        x: -20
                    },
                    xAxis: {
                        type: 'Cost',
                        tickInterval: 3600 * 1000, // one hour
                        tickWidth: 0,
                        gridLineWidth: 1,
                        labels: {
                            align: 'center',
                            x: -3,
                            y: 20,
                            formatter: function() {
                                //return Highcharts.dateFormat('%l%p', this.value);
                                return "Cost"
                            }
                        }
                    },
                    yAxis: {
                        title: {
                            text: 'Year'
                        },
                        plotLines: [{
                            value: 0,
                            width: 1,
                            color: '#808080'
                        }]
                    },
                    tooltip: {
                        formatter: function() {
                                //return Highcharts.dateFormat('%l%p', this.x-(1000*3600)) +'-'+ Highcharts.dateFormat('%l%p', this.x) +': <b>'+ this.y + '</b>';
								return "Cost:"+this.y;
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
                    series: [{
                        name: 'Cost'
                    }]
                }
                // Load data asynchronously using jQuery. On success, add the data
                // to the options and initiate the chart.
                // This data is obtained by exporting a GA custom report to TSV.
                // http://api.jquery.com/jQuery.get/
                jQuery.get('data5.php', null, function(tsv) {
                    var lines = [];
                    traffic = [];
                    try {
                        // split the data return into lines and parse them
                        tsv = tsv.split(/\n/g);
                        jQuery.each(tsv, function(i, line) {
                            line = line.split(/\t/);
                            date = parseInt(line[0]);
                            traffic.push([
                                date,
                                parseInt(line[1].replace(',', ''), 10)
                            ]);
                        });
                    } catch (e) {  }
                    options.series[0].data = traffic;
                    chart = new Highcharts.Chart(options);
                });
            });
</script>
<script src="http://code.highcharts.com/highcharts.js"></script>
        <script src="http://code.highcharts.com/modules/exporting.js"></script>
    </head>
    <body>
        <div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
        <a href="index.php"><button type="button" class="btn btn-success">Home</button></a>
        <a href="index4.php" class="right"><button type="button" class="btn btn-success">Prev</button></a>
    </body>
</html>