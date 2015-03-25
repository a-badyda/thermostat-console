<?php
	include("get-server.php");
	include( "register-node.php");
?>
<style type="text/css">
	body{
	    font-family: verdana;
	}
</style>

<h2> Temperature Statistics </h2>

<script> console.log("stats loaded"); 

	TextDataTemperature();

	
</script>

<p class="local-conditions-text-data"></p>

<div id="temp-chart" class="chart"></div>
