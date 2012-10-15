<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pwd = '';

$database = 'WTE';
$ti = 'orders';

if (!mysql_connect($db_host, $db_user, $db_pwd))
    die("Can't connect to database");

if (!mysql_select_db($database))
    die("Can't select database");

$result = mysql_query("TRUNCATE TABLE {$ti}");
?>
<html>
Table truncated.
<script>
    document.write('<a href="' + document.referrer + '">Go Back</a>');
</script>
</html>