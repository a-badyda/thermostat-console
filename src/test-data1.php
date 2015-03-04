<?php
// The JSON standard MIME header.
header('Content-type: application/json');

//some fake temperature data to send over to the server
$temperatureData = array( 
	array(0, -3),
	array(1, -1),
	array(2, 3),
	array(3, 6),
	array(4, 10),
	array(5, 15),
	array(6, 16),
	array(7, 14),
	array(8, 10),
	array(9, 5),
	array(10, 6),
	array(11, 10),
	array(12, 15)
	);

// Send the data.
print_r(json_encode($temperatureData));


?>
