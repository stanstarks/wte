<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pwd = '';

$database = 'WTE';
$ti = 'orders';

$price = $_POST['price'];
$distance = $_POST['distance'];
$deadline = $_POST['deadline'];
$ip = $_POST['ip'];

if (!mysql_connect($db_host, $db_user, $db_pwd))
    die("Can't connect to database");

if (!mysql_select_db($database))
    die("Can't select database");

$result = mysql_query("DELETE FROM {$ti} WHERE ip='{$ip}'");
if($deadline !== '')
	$result = mysql_query("INSERT INTO {$ti} (ip, price, distance, deadline) VALUES ('{$ip}',{$price},{$distance},'{$deadline}')");
else
	$result = mysql_query("INSERT INTO {$ti} (ip, price, distance) VALUES ('{$ip}',{$price},{$distance})");
if (!$result) {
    die("Query to show fields from table failed");
}
?>

<html>
Order has been made.
<script>
    document.write('<a href="' + document.referrer + '">Go Back</a>');
</script>
</html>