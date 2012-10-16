<!DOCTYPE html>
<html>
<!-- This is a demonstration of HTML5 goodness with healthy does of CSS3 mixed in -->
<head>
    <title>428: Where to Eat?</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

    <!--[if IE]>
    	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <!--[if IE 7]>
    	<link rel="stylesheet" href="ie7.css" type="text/css" media="screen" />
    <![endif]-->
    
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
    		<h1><a class="checklink anchorLink" href="#check">Where To Eat?</a></h1>
    		<nav> <!-- HTML5 navigation tag -->
    			<ul>
					<li><a class="checklink anchorLink" href="#check">Check</a></li>
    				<li><a class="orderlink anchorLink" href="#order">Order</a></li>
					<li><a class="introlink anchorLink" href="#intro">Intro</a></li>
    				<li><a class="portfoliolink anchorLink" href="#portfolio">Browse</a></li>
    			</ul>				
    		</nav>
    	</div>
    </header>

    <section id="contentcontainer"> <!-- HTML5 section tag for the content 'section' -->

<?php
include "vars.php";
?>
<?php
if (!mysql_connect($db_host, $db_user, $db_pwd)){
    die("<section id=\"dberr\"><h2 class=\"order\">Database Failure</h2><p>Can't connect to database.</p></section>");
}

if (!mysql_select_db($database))
    die("<section id=\"dberr\"><h2 class=\"order\">Database Failure</h2><p>Can't select database.</p></section>");

$result = mysql_query("SELECT * FROM {$ti}");
if (!$result) {
    die("<section id=\"dberr\"><h2 class=\"order\">Database Failure</h2><p>Query to show fields from table failed.</p></section>");
}
$num = mysql_num_rows($result);
$i = 0;
?>

		<section id="check"> <!-- HTML5 section tag for the about 'section' -->
    		<h2 class="check">Check Submissions</h2>
    		<p>Your IP address (<?php echo $_SERVER["REMOTE_ADDR"]; ?>) will appear on your submission.</p>
			<p><b>Found a mistake in your submission?</b> Don't worry, just resubmit and your former submission will be replaced.</p>
			<!-- Table markup-->

<table id="ver-minimalist">

	<!-- Table header -->
	
		<thead>
			<tr>
				<th scope="col" id="orderer">IP Address</th>
				<th scope="col" id="price">Price</th>
				<th scope="col" id="distance">Distance</th>
				<th scope="col" id="deadline">Deadline</th>
				<th scope="col" id="distance">Submission Timestamp</th>
			</tr>
		</thead>
	
	<!-- Table body -->
	
		<tbody>
			<?php
			while($i<$num):
				$ip = mysql_result($result,$i,"ip");
				$price = mysql_result($result,$i,"price");
				$distance = mysql_result($result,$i,"distance");
				$deadline = mysql_result($result,$i,"deadline");
				$time = mysql_result($result,$i,"time");
				echo "<tr>";
				echo "<td>" . $ip . "</td>";
				echo "<td>"."CN¥".$price."</td>";
				echo "<td>".$distance."min</td>";
				echo "<td>" . $deadline . "</td>";
				echo "<td>" . $time . "</td>";
				echo "</tr>"; 
				
				$i++;
				endwhile;
			?>
		</tbody>

</table>
			<p>After everyone has submitted: <a href="dice.php">Roll the Dice!</a></p>
			<p>Since everyone is satisfied... <a href="delete.php">Clear the Submissions</a>.</p>
    	</section>
		<section id="order"> <!-- HTML5 section tag for the contact 'section' -->
    	
    		<h2 class="order">Order Now</h2>
    		
    		<p>* In this alpha version, the first two blanks are required.</p>
    		<?php $user_ip = $_SERVER['REMOTE_ADDR']; ?>
    		<form id="orderform" action="order.php" method="POST"> 

    			<p><label for="price">Price in CN¥ *</label></p> 
    			<input type="text" id=price name=price placeholder="How much do you want to pay?" required tabindex="1" /> 
    			<input type="hidden" name="ip" value="<?php echo $user_ip ?>" />
    			<p><label for="distance">Distance (Minute Walking Time) *</label></p> 
    			<input type="text" id=distance name=distance placeholder="How far / long do you want to walk?" required tabindex="2" /> 
				
				<p><label for="deadline">Deadline</label></p> 
    			<input type="text" id=deadline name=deadline placeholder="Do you have to eat before hH:MM?" tabindex="3" /> 
    			<!-- 
    			<p><label for="comment">Extra Message</label></p> 
    			<textarea name="comment" id="comment" tabindex="4"></textarea> 
    			 -->
    			<input name="submit" type="submit" id="submit" tabindex="5" value="Submit" /> 
    			 
    		</form> 

    	
    	</section>
    	<section id="intro">
    	
    		<h2 class="intro">About Where To Eat?</h2>
    		
    		<!--<a class="featured" href="http://inspectelement.com"><img src="images/featured.gif" alt="Inspect Element large preview" /></a>
    		
    		<p>Featured Project: <a href="#">Inspect Element</a></p>-->
    				
    	</section>

    	<section id="portfolio"> <!-- HTML5 section tag for the portfolio 'section' -->
    	
    		<h2 class="work">Places to Eat</h2>
    			
    		<ul class="work">
    			<li>
    				<a href="http://inspectelement.com"><img src="images/inspectelementSmall.jpg" alt="Inspect Element preview" /></a>
    			</li>
    			<li>
    				<a href="http://inspectelement.com"><img src="images/inspectelementSmall.jpg" alt="Inspect Element preview" /></a>
    			</li>
    			<li>
    				<a href="http://inspectelement.com"><img src="images/inspectelementSmall.jpg" alt="Inspect Element preview" /></a>
    			</li>
    			<li>
    				<a href="http://inspectelement.com"><img src="images/inspectelementSmall.jpg" alt="Inspect Element preview" /></a>
    			</li>
    			<li>
    				<a href="http://inspectelement.com"><img src="images/inspectelementSmall.jpg" alt="Inspect Element preview" /></a>
    			</li>
    			<li>
    				<a href="http://inspectelement.com"><img src="images/inspectelementSmall.jpg" alt="Inspect Element preview" /></a>
    			</li>
    			<li>
    				<a href="http://inspectelement.com"><img src="images/inspectelementSmall.jpg" alt="Inspect Element preview" /></a>
    			</li>
    			<li>
    				<a href="http://inspectelement.com"><img src="images/inspectelementSmall.jpg" alt="Inspect Element preview" /></a>
    			</li>
    			<li>
    				<a href="http://inspectelement.com"><img src="images/inspectelementSmall.jpg" alt="Inspect Element preview" /></a>
    			</li>
    		</ul>
    				
    	</section>
    			
    	<footer> <!-- HTML5 footer tag -->
    	
    		<ul>
    			<li><img src="images/twitter.png" alt="" /><a href="http://twitter.com/tkenny">Follow me on Twitter</a></li>
    			<li><a href="http://inspectelement.com/articles/code-a-backwards-compatible-one-page-portfolio-with-html5-and-css3">Back to the Tutorial on Inspect Element</a></li>
    		</ul>
    	
    	</footer>
    </section>
</body>
</html>
