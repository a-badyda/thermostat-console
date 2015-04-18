<?php
// The JSON standard MIME header.
header('Content-type: application/json');

$temperatureData = array( 
	array("start" =>"2015-04-20", "title" => "event 1"),
	array("start" =>"2015-03-28", "title" => "event 2"),
	array("start" =>"2015-04-22", "title" => "event 3"),
	array("start" =>"2015-04-01T09:00:00", "title" => "event 4")
	);

// Send the data.
print_r(json_encode($temperatureData));

?>
