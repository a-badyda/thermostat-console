<?php
	
	//for testing purposes only, delete on release 
	ini_set("display_errors",1);  
	error_reporting(E_ALL);

	//from stack overflow
	//Function to get the client IP address
	function get_client_ip() {
	    $ipaddress = "";
	    if (getenv("HTTP_CLIENT_IP"))
	        $ipaddress = getenv("HTTP_CLIENT_IP");
	    else if(getenv("HTTP_X_FORWARDED_FOR"))
	        $ipaddress = getenv("HTTP_X_FORWARDED_FOR");
	    else if(getenv("HTTP_X_FORWARDED"))
	        $ipaddress = getenv("HTTP_X_FORWARDED");
	    else if(getenv("HTTP_FORWARDED_FOR"))
	        $ipaddress = getenv("HTTP_FORWARDED_FOR");
	    else if(getenv("HTTP_FORWARDED"))
	       $ipaddress = getenv("HTTP_FORWARDED");
	    else if(getenv("REMOTE_ADDR"))
	        $ipaddress = getenv("REMOTE_ADDR");
	    else
	        $ipaddress = "UNKNOWN";
	    return $ipaddress;
	}	
?>
<!DOCTYPE html>
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link href="libraries/css/fullcalendar.css" rel="stylesheet" />
	<link href="libraries/css/fullcalendar.print.css" rel="stylesheet" media="print" />

	<script>


		$(document).ready(function() {
		
			$("#calendar").fullCalendar({
				header: {
					left: "prev,next today",
					center: "title",
					right: "month,basicWeek,basicDay"
				},
				//defaultDate: "2015-03-12",
				editable: false,
				eventLimit: true, // allow "more" link when too many events
				events: [
					
				]
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

			var apiKey= "777";
			var timeout= "1000";
			var nodeID= localStorage.getItem("nodeID");
			

			//need more text

			function GetCalendarData(){

				$.ajax({
					//url: " https://"+servIP+"/fullcalendar/demos/default.html",
					url: "https://"+servIP+"/thermostat-console/src/test-calendar.php", 

			    	type: "post",
			    	async: true, cache: false,
			    	
			    	success: function(data){
			    		//do whatever to confirm
			    		console.log("calendar data request sent");
			    		console.log(data);

			    	}, 

			    	error: function(data){
			    		console.log("ERROR 10 - Attribute not registered");
			    	}
			    });

			}

			GetCalendarData();

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
