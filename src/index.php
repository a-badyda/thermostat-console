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
	  	
	  	<title> Thermostat Interface </title>
	  	<link rel="stylesheet" href="libraries/css/jquery-ui.css">
	  	
	  	<script src='libraries/fullcalendar-2.2.7/lib/moment.min.js'></script>
		<script src='libraries/fullcalendar-2.2.7/lib/jquery.min.js'></script>
		<script src='libraries/fullcalendar-2.2.7/fullcalendar.min.js'></script>
		<script src="libraries/jquery-1.11.2.js"></script>
	  	<script src="libraries/jquery-ui.js"></script>
	  	<script src="libraries/flotr2.min.js"></script>

		<script>
			$(function() {
				$("#tabs").tabs();

				//begin loading in parts of the site 
				$("#stats").load("stats.php");
				$("#heat").load("heat.php");
				$("#book").load("book.php");
				$("#login").load("login.php");


				

	$(document).ready(function() {
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
			defaultDate: '2015-02-12',
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: [
				{
					title: 'All Day Event',
					start: '2015-02-01'
				},
				{
					title: 'Long Event',
					start: '2015-02-07',
					end: '2015-02-10'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2015-02-09T16:00:00'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2015-02-16T16:00:00'
				},
				{
					title: 'Conference',
					start: '2015-02-11',
					end: '2015-02-13'
				},
				{
					title: 'Meeting',
					start: '2015-02-12T10:30:00',
					end: '2015-02-12T12:30:00'
				},
				{
					title: 'Lunch',
					start: '2015-02-12T12:00:00'
				},
				{
					title: 'Meeting',
					start: '2015-02-12T14:30:00'
				},
				{
					title: 'Happy Hour',
					start: '2015-02-12T17:30:00'
				},
				{
					title: 'Dinner',
					start: '2015-02-12T20:00:00'
				},
				{
					title: 'Birthday Party',
					start: '2015-02-13T07:00:00'
				},
				{
					title: 'Click for Google',
					url: 'http://google.com/',
					start: '2015-02-28'
				}
			]
		});
		
	});


				
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