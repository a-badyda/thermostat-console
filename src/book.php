<?php
	
	include("get-server.php");
	include( "register-node.php");

	//for testing purposes only, delete on release 
	ini_set("display_errors",1);  
	error_reporting(E_ALL);

?>
<!DOCTYPE html>
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<link href="libraries/css/fullcalendar.css" rel="stylesheet" />
	<link href="libraries/css/fullcalendar.print.css" rel="stylesheet" media="print" />
	  	
		<script src="libraries/jquery-1.11.2.js"></script>
		  	<script src="libraries/jquery-ui.js"></script>
		  	<script src="libraries/flotr2.min.js"></script>
			<script src="libraries/moment.min.js"></script>
			<script src="libraries/fullcalendar.min.js"></script>

	<script>


		$(document).ready(function() {

			var servIP = <?php print_r( "\"". $_SERVER["SERVER_ADDR"] ."\"");  ?>;
		
			$("#calendar").fullCalendar({
				header: {
					left: "prev,next today",
					center: "title",
					right: "month,basicWeek,basicDay"
				},
				//defaultDate: "2015-03-12",
				editable: false,
				eventLimit: true, // allow "more" link when too many events
				events: "http://"+servIP+"/thermostat-console/src/test-calendar.php"
			});
			
			//real quick function to run to get rid of a stupid error
			$("button").click( function(){
	 			var weekString = $(document).find(".fc-center").text();
				weekString = weekString.replace("â€”", "to");
				$(document).find(".fc-center").find("h2").text(weekString);
			});

			//bunch of global vars for now 
			var servIP = <?php print_r( "\"". $_SERVER["SERVER_ADDR"] ."\"");  ?>;
			var localIP= <?php print_r( "\"". get_client_ip() ."\"");  ?>;			
		});

	</script>
	<style>

		body {
			padding: 0;
			font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
			font-size: 14px;
		}

		#calendar {
			max-width: 600px;
			margin: 0 auto;
		}

	</style>
	</head>	<body>

		<div id="calendar"></div>

	</body>
</html>
