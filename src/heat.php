<?php

?>

<script>

	function showTemperature(){
		console.log(localStorage.getItem("insideNow")+ " "+ localStorage.getItem("outsideNow"));
		//append temperature data
		var currentOut = localStorage.getItem("outsideNow").substr(localStorage.getItem("outsideNow").indexOf(",")+1); 
		var currentIn = localStorage.getItem("insideNow").substr(localStorage.getItem("insideNow").indexOf(",")+1); 
		$( "#temperature-inside" ).append( currentIn );
		$( "#temperature-outside" ).append( currentOut );

		//apply some style to the strings to make it stand out more

	}

	showTemperature();
</script>

<p id="local-conditions-text-data">It is currently 
	<span id="temperature-inside"></span> Celsius degrees inside, 
	and 
	<span id="temperature-outside"></span> Celsius outside.
	<br />
	The room humidity is at <span id="humidity-now"></span>.
</p>

<script> console.log("heating loaded"); </script>

