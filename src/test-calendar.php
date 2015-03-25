<?php
// The JSON standard MIME header.
header('Content-type: application/json');

//some fake temperature data to send over to the server
	{"events":[
		{
			"title": "All Day Event",
			"start": "2015-03-01"
		},
		{
			"title": "Long Event",
			"start": "2015-03-07",
			"end": "2015-03-10"
		},
		{
			"id": "999",
			"title": "Repeating Event",
			"start": "2015-03-09T16:00:00"
		},
		{
			"id": "999",
			"title": "Repeating Event",
			"start": "2015-03-16T16:00:00"
		},
		{
			"title": "Conference",
			"start": "2015-03-11",
			"end": "2015-03-13"
		},
		{
			"title": "Meeting",
			"start": "2015-03-12T10:30:00",
			"end": "2015-03-12T12:30:00"
		},
		{
			"title": "Lunch",
			"start": "2015-03-12T12:00:00"
		},
		{
			"title": "Meeting",
			"start": "2015-03-12T14:30:00"
		},
		{
			"title": "Happy Hour",
			"start": "2015-03-12T17:30:00"
		},
		{
			"title": "Dinner",
			"start": "2015-03-12T20:00:00"
		},
		{
			"title": "Birthday Party",
			"start": "2015-03-13T07:00:00"
		},
		{
			"title": "Click for Google",
			"url": "http://google.com/",
			"start": "2015-03-28"
		}
	]}

?>
