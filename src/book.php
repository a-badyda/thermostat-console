<!DOCTYPE html>
<?php
	include("get-server.php");
?>
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link href="libraries/css/fullcalendar.css" rel="stylesheet" />
	<link href="libraries/css/fullcalendar.print.css" rel="stylesheet" media="print" />

	<script src="register-node.js"></script>



	<script>

		$(document).ready(function() {
			
			$("#calendar").fullCalendar({
				header: {
					left: "prev,next today",
					center: "title",
					right: "month,basicWeek,basicDay"
				},
				//defaultDate: "2015-02-12",
				editable: false,
				eventLimit: true, // allow "more" link when too many events
				events: [
					{
						title: "All Day Event",
						start: "2015-02-01"
					},
					{
						title: "Long Event",
						start: "2015-02-07",
						end: "2015-02-10"
					},
					{
						id: 999,
						title: "Repeating Event",
						start: "2015-02-09T16:00:00"
					},
					{
						id: 999,
						title: "Repeating Event",
						start: "2015-02-16T16:00:00"
					},
					{
						title: "Conference",
						start: "2015-02-11",
						end: "2015-02-13"
					},
					{
						title: "Meeting",
						start: "2015-02-12T10:30:00",
						end: "2015-02-12T12:30:00"
					},
					{
						title: "Lunch",
						start: "2015-02-12T12:00:00"
					},
					{
						title: "Meeting",
						start: "2015-02-12T14:30:00"
					},
					{
						title: "Happy Hour",
						start: "2015-02-12T17:30:00"
					},
					{
						title: "Dinner",
						start: "2015-02-12T20:00:00"
					},
					{
						title: "Birthday Party",
						start: "2015-02-13T07:00:00"
					},
					{
						title: "Click for Google",
						url: "http://google.com/",
						start: "2015-02-28"
					}
				]
			});

			
			//real quick function to run to get rid of a stupid error
			$("button").click( function(){
	 			var weekString = $(document).find(".fc-center").text();
				weekString = weekString.replace("â€”", "to");
				$(document).find(".fc-center").find("h2").text(weekString);
			});

			//
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
