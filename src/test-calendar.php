<?php
// The JSON standard MIME header.
header('Content-type: application/json');

$event = array(
 "events" =>
		array(
			"title"=> "All Day Event",
			"start"=> "2015-03-01"
		),
		array(
			"title"=> "Long Event",
			"start"=> "2015-03-07",
			"end"=> "2015-03-10"
		),
		array(
			"id"=> "999",
			"title"=> "Repeating Event",
			"start"=>"2015-03-09T16:00:00"
		),
		array(
			"id"=>"999",
			"title"=>"Repeating Event",
			"start"=>"2015-03-16T16:00:00"
		),
		array(
			"title"=>"Conference",
			"start"=>"2015-03-11",
			"end"=>"2015-03-13"
		),
		array(
			"title"=>"Meeting",
			"start"=>"2015-03-12T10:30:00",
			"end"=>"2015-03-12T12:30:00"
		),
		array(
			"title"=>"Lunch",
			"start"=>"2015-03-12T12:00:00"
		),
		array(
			"title"=>"Meeting",
			"start"=>"2015-03-12T14:30:00"
		),
		array(
			"title"=>"Happy Hour",
			"start"=>"2015-03-12T17:30:00"
		),
		array(
			"title"=>"Dinner",
			"start"=>"2015-03-12T20:00:00"
		),
		array(
			"title"=>"Birthday Party",
			"start"=>"2015-03-13T07:00:00"
		),
		array(
			"title"=>"Click for Google",
			"url"=>"http://google.com/",
			"start"=>"2015-03-28"
		)
	);

print_r(json_encode($event));


echo" ";
?>
