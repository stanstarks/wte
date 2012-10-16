<?php
include "vars.php";

if (!mysql_connect($db_host, $db_user, $db_pwd))
    die("Can't connect to database");

if (!mysql_select_db($database))
    die("Can't select database");

$result = mysql_query("SELECT * FROM {$ti}");
if (!$result) {
    die("Query to show fields from table failed");
}
$num = mysql_num_rows($result);
$prices = array();
$dists = array();
for ($i=0; $i<$num; ++$i){
	array_push($prices, mysql_result($result,$i,"price"));
	array_push($dists, mysql_result($result,$i,"distance"));
}
$price = $prices[array_rand($prices, 1)];
$dist = $dists[array_rand($dists, 1)];
mysql_query("SET CHARACTER SET utf8");
mysql_query("SET NAMES 'utf8'");
$place = mysql_query("SELECT name,count FROM {$tr} WHERE price<={$price} AND distance<={$dist} ORDER BY count LIMIT 1");

if (!$place) {
    die("Query to show fields from table failed");
}
if(mysql_num_rows($place)==0){
	echo "<p>Nobody sells such cheap food nearby, or you'd better go downstairs and grab some instant noodles.</p>";
}
else{
$name = mysql_result($place,0,"name");
$count = mysql_result($place,0,"count");
$count++;
mysql_query("UPDATE {$tr} SET count={$count} WHERE name='{$name}'");
echo $name;
}
?>
<html>
<script>
    document.write('<a href="' + document.referrer + '">Go Back</a>');
</script>
</html>
