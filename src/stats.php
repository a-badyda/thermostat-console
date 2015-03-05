<?php
	include("register-node.php");
?>
<style type="text/css">
	body{
	    font-family: verdana;
	}
</style>

<h2> Temperature Statistics </h2>

<script> console.log("stats loaded"); 
	
	setTimeout(showTemperature(),2000);
</script>

<p id="local-conditions-text-data">It is currently 
	<span id="temperature-inside"></span>&degC inside, 
	and 
	<span id="temperature-outside"></span>&degC outside.
	The room humidity is at <span id="humidity-now"></span>%.
</p>


<div id="temp-chart" class="chart">

</div>
