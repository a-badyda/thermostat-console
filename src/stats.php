<?php
	include("register-node.php");
?>
<style type="text/css">
    #temp-chart{
	    width: 700px; 
	    height: 300px;
	    display: block;
	    visibility: visible;
	}
	body{
	    font-family: verdana;
	}
</style>

<h2> Temperature Statistics </h2>

<script> console.log("stats loaded"); 
	
	var graph;

	RequestLocalTemp();

	//Find a way to display the Current Temperature (in & out)
	//Find a way to display humidity 

</script>


<div id="temp-chart">

</div>
