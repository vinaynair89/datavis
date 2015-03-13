<?php
$con = mysql_connect("localhost","root","Vinay1989");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("mydb", $con);

$result = mysql_query("select CAST(SUBSTRING_INDEX(date, '/', -1) as unsigned) as Year,CAST(SUM(TotalCost) as decimal(53,2)) as Cost from test group by Year");

while($row = mysql_fetch_array($result)) {
  echo $row['Year'] . "\t" . $row['Cost']. "\n";
}

mysql_close($con);
?>