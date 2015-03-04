<?php
	include("register-node.php");
?>
<script>
	showTemperature();
</script>

<p id="local-conditions-text-data">It is currently 
	<span id="temperature-inside"></span>&degC inside, 
	and 
	<span id="temperature-outside"></span>&degC outside.
	The room humidity is at <span id="humidity-now"></span>%.
</p>

<script> console.log("heating loaded"); </script>

