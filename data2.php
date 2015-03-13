<?php
$con = mysql_connect("localhost","root","Vinay1989");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("mydb", $con);

$query = mysql_query("select s1.Quarter,s1.Cost from (select Region,CAST(SUBSTRING_INDEX(date, '/', -1) as UNSIGNED) as Year, case CAST(SUBSTRING_INDEX(date, '/', -3) as UNSIGNED) when 1 then 'Quarter 1' when 2 then 'Quarter 1' when 3 then 'Quarter 1' when 4 then 'Quarter 2' when 5 then 'Quarter 2' when 6 then 'Quarter 2' when 7 then 'Quarter 3' when 8 then 'Quarter 3' when 9 then 'Quarter 3' when 10 then 'Quarter 4' when 11 then 'Quarter 4' when 12 then 'Quarter 4' end as Quarter,CAST(SUM(TotalCost) as decimal(53,2)) as Cost from test group by Region,Quarter,Year order by Cost desc) as s1 where s1.Quarter not in ('Quarter 1') group by s1.Quarter order by s1.Cost desc Limit 4");

$category = array();
$category['name'] = 'Quarter';

$series1 = array();
$series1['name'] = 'Cost';

/*
$series2 = array();
$series2['name'] = 'CodeIgniter';

$series3 = array();
$series3['name'] = 'Highcharts';*/

while($r = mysql_fetch_array($query)) {
    $category['data'][] = $r['Quarter'];
    $series1['data'][] = $r['Cost'];
    /*$series2['data'][] = $r['codeigniter'];
    $series3['data'][] = $r['highcharts'];   */
}

$result = array();
array_push($result,$category);
array_push($result,$series1);
/*array_push($result,$series2);
array_push($result,$series3);*/

print json_encode($result, JSON_NUMERIC_CHECK);

mysql_close($con);
?>