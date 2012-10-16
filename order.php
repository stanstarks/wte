<?php
include "vars.php";

$price = $_POST['price'];
$distance = $_POST['distance'];
$deadline = $_POST['deadline'];
$ip = $_POST['ip'];
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

$result = mysql_query("DELETE FROM {$ti} WHERE ip='{$ip}'");
if($deadline !== '')
	$result = mysql_query("INSERT INTO {$ti} (ip, price, distance, deadline) VALUES ('{$ip}',{$price},{$distance},'{$deadline}')");
else
	$result = mysql_query("INSERT INTO {$ti} (ip, price, distance) VALUES ('{$ip}',{$price},{$distance})");
if (!$result) {
    die("<section id=\"dberr\"><h2 class=\"order\">Database Failure</h2><p>Query to show fields from table failed.</p></section>");
}
?>

        <section id="only">
            <h2 class="order">Order Submitted</h2>
            <p>Will redirect you back home in 3 seconds...</p>
<?php header('refresh:3; url=/wte');?>
            <p>If your browser doesn't redirect you automatically, <script>
    document.write('<a href="' + document.referrer + '">click here</a>');
</script>.</p>
        </section>
    </section>
</body>
</html>
