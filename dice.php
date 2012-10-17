<?php
include "vars.php";
?>

<html>
<head>
    <title>428: Where to Eat?</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
    <link rel="shortcut icon" href="icon.png" />
    <link rel="icon" href="icon.png" />

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.min.js" type="text/javascript"></script>
    <script src="js/jquery.anchor.js" type="text/javascript"></script>
    <script src="js/jquery.fancybox-1.2.6.pack.js" type="text/javascript"></script>
</head>
<body>
    <header> <!-- HTML5 header tag -->
    	<div id="headercontainer">
    		<h1><a class="checklink anchorLink">Where To Eat?</a></h1>
    		<nav> <!-- HTML5 navigation tag -->
    		</nav>
    	</div>
    </header>

    <section id="contentcontainer">
<?php
if (!mysql_connect($db_host, $db_user, $db_pwd))
    die("<section id=\"dberr\"><h2 class=\"order\">Database Failure</h2><p>Can't connect to database.</p></section>");

if (!mysql_select_db($database))
    die("<section id=\"dberr\"><h2 class=\"order\">Database Failure</h2><p>Can't select database.</p></section>");

$result = mysql_query("SELECT * FROM {$ti}");
if (!$result) {
    die("<section id=\"dberr\"><h2 class=\"order\">Database Failure</h2><p>Query to show fields from table failed.</p></section>");
}?>
        <section id="only">
            <h2 class="check">Problem Solved</h2>

<?php
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
$place = mysql_query("SELECT name,count FROM {$tr} WHERE price<={$price} AND distance<={$dist} AND ( lunch_end > NOW() OR (dinner_start < NOW() AND dinner_end > NOW())) ORDER BY count LIMIT 1");

if (!$place) {
    echo "<p>We'd better wait for some orders and try again later.</p>";
}
else if(mysql_num_rows($place)==0){
	echo "<p>Nobody sells such cheap food nearby, or you'd better go downstairs and grab some instant noodles.</p>";
}
else{
$name = mysql_result($place,0,"name");
$count = mysql_result($place,0,"count");
$count++;
mysql_query("UPDATE {$tr} SET count={$count} WHERE name='{$name}'");
echo "<p>The solution is: {$name}</p>";
}
?>

<p><script>
    document.write('<a href="' + document.referrer + '">Click here</a>');
</script> to go back.</p>
        </section>
    </section>
</body>
</html>
