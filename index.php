<!DOCTYPE html>
<html lang="en">

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
    				<li><a class="orderlink anchorLink" href="#order">Order</a></li>
					<li><a class="checklink anchorLink" href="#check">Check</a></li>
					<li><a class="introlink anchorLink" href="#intro">Intro</a></li>
    				<li><a class="portfoliolink anchorLink" href="#portfolio">Browse</a></li>
    			</ul>				
    		</nav>
    	
    	</div>
    
    </header>

    <section id="contentcontainer"> <!-- HTML5 section tag for the content 'section' -->

		<section id="check"> <!-- HTML5 section tag for the about 'section' -->
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

$result = mysql_query("SELECT * FROM {$ti}");
if (!$result) {
    die("Query to show fields from table failed");
}
$num = mysql_num_rows($result);
$i = 0;
?>
    		<h2 class="check">Check Order</h2>
    		
    		<p>TODO: add table style</p>
			<p><b> Found a mistake in your submission?</b> Don't worry, just resubmit your order and your former order will be deleted.</p>
			<!-- Table markup-->

<table id="ver-minimalist">

	<!-- Table header -->
	
		<thead>
			<tr>
				<th scope="col" id="orderer">Orderer</th>
				<th scope="col" id="price">Price</th>
				<th scope="col" id="distance">Distance</th>
				<th scope="col" id="deadline">Deadline</th>
				<th scope="col" id="distance">Submission Time</th>
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
				echo "<td>" . $price . " Yuan</td>";
				echo "<td>" . $distance . " MWT</td>";
				echo "<td>" . $deadline . "</td>";
				echo "<td>" . $time . "</td>";
				echo "</tr>"; 
				
				$i++;
				endwhile;
			?>
		</tbody>

</table>
			<p>After everyone has submitted his result: <a href="dice.php">Roll the Dice!</a></p>
			<p>Since everyone is satisfied... <a href="delete.php">Delete the Orders</a></p>
    	</section>
		<section id="order"> <!-- HTML5 section tag for the contact 'section' -->
    	
    		<h2 class="order">Order Now</h2>
    		
    		<p>In this alpha version, the first two blanks are required.</p>
    		<?php $user_ip = $_SERVER['REMOTE_ADDR']; ?>
    		<form id="orderform" action="order.php" method="POST"> 

    			<p><label for="price">Price (RMB)</label></p> 
    			<input type="text" id=price name=price placeholder="How much you want to pay?" required tabindex="1" /> 
    			<input type="hidden" name="ip" value="<?php echo $user_ip ?>" />
    			<p><label for="distance">Distance (minute walking time)</label></p> 
    			<input type="text" id=distance name=distance placeholder="How long you want to walk?" required tabindex="2" /> 
				
				<p><label for="deadline">Time</label></p> 
    			<input type="text" id=deadline name=deadline placeholder="Eat before hh:mm" tabindex="3" /> 
    			<!-- 
    			<p><label for="comment">Extra Message</label></p> 
    			<textarea name="comment" id="comment" tabindex="4"></textarea> 
    			 -->
    			<input name="submit" type="submit" id="submit" tabindex="5" value="Submit Order" /> 
    			 
    		</form> 

    	
    	</section>
    	<section id="intro">
    	
    		<h2 class="intro">Hand-coded <strong>HTML</strong> and <strong>CSS</strong> is what I do. <span class="sub">It's what I'm good at so why not?</span></h2>
    		
    		<a class="featured" href="http://inspectelement.com"><img src="images/featured.gif" alt="Inspect Element large preview" /></a>
    		
    		<p>Featured Project: <a href="#">Inspect Element</a></p>
    				
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