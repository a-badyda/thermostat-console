<?php
// The JSON standard MIME header.
header('Content-type: application/json');

//some fake temperature data to send over to the server
$temperatureData = 55;

// Send the data.
print_r(json_encode($temperatureData));


?>
