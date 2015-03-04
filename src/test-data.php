<?php
// The JSON standard MIME header.
header('Content-type: application/json');

//some fake temperature data to send over to the server
$temperatureData = array( 
	array(0, 15),
	array(1, 15),
	array(2, 15),
	array(3, 15),
	array(4, 17),
	array(5, 20),
	array(6, 20),
	array(7, 20),
	array(8, 18),
	array(9, 15),
	array(10, 13),
	array(11, 10),
	array(12, 13)
	);

// Send the data.
print_r(json_encode($temperatureData));


?>
