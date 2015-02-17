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
	  	
	  	<title>jQuery UI Tabs - Default functionality</title>
	  	<link rel="stylesheet" href="libraries/css/jquery-ui.css">
	  	
	  	<script src="libraries/jquery-1.11.2.js"></script>
	  	<script src="libraries/jquery-ui.js"></script>

		<script>
			$(function() {
				$( "#tabs" ).tabs();
				$("#login").html('<object data="192.168.2.59/thermostat-console/src/stats.php"/>');

		  	});

		  </script>

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
				<p> hello friends </p>
			</div>

		  	<div id="heat">
				<p> What</p>
			</div>

		  	<div id="book">
				<p> why </p>
			</div>

			<div id="login">
				<object type="text/html" data="http://validator.w3.org/" width="800px" height="600px" 
				 style="overflow:auto;border:5px ridge blue">
				</object>
			</div>


		</div>
		 
	</body>

</html>