<?php
	include("register-node.php");
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- 
       special meta tags should be added into HTML that is supposed to be 
       loaded on mobile devices 
    	-->
    	<meta name="viewport" content="width=device-width,initial-scale=1.0, user-scalable=0"/>
    	<meta name="msapplication-tap-highlight" content="no" />
	  	
	  	<title>Themostat Console Interface</title>
	  	<link rel="stylesheet" href="libraries/css/jquery-ui.css">
	  	
		<script src="libraries/jquery-1.11.2.js"></script>
	  	<script src="libraries/jquery-ui.js"></script>
	  	<script src="libraries/flotr2.min.js"></script>

		<script>
			$(function() {
				$("#tabs").tabs({selected: 'stats.php' });

				//begin loading in parts of the site 
				$("#heat").load("heat.php");
				$("#book").load("book.php");
				$("#login").load("login.php");
				$("#stats").load("stats.php");


		  	});

		  </script>

		<style>
		    .chart{
		    	width: 700px; 
		    	height: 300px;
			    display: block;
			    visibility: visible;
			}
			
		</style>

	</head>
	<body>
	 
		<div id="tabs">
		  	<ul>
				<li><a href="#stats">Statistics</a></li>
				<li><a href="#heat">Heating Control</a></li>
				<li><a href="#book">Room Booking</a></li>
				<li><a href="#login">User Login</a></li>
		  	</ul>

		  	<div id="stats">
				
			</div>

		  	<div id="heat">
				
			</div>

		  	<div id="book">
	
			</div>

			<div id="login">

			</div>


		</div>
		 
	</body>

</html>