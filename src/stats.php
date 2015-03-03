<?php

?>
<style type="text/css">
    #temp-chart{
	    width: 600px; 
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

	function temp_chart(container) {

		var	derp = [];
		var inside =[];
		var outside = [];
		var i;

	  	RequestLocalTemp(inside);

		for (var j = 0; j < 24; j += 0.1) {
		    //inside.push([derp[j], j]);
		}
		RequestLocalTemp(inside);
		inside = RequestLocalTemp(inside);
		console.log(inside);

		var markerFormatter = function(obj){
			return ' '+(obj.y).toFixed(0) + '%';
		}

		// Draw the graph
		graph = Flotr.draw(
			container, 
			[ inside, outside ], 
			{
			    xaxis: {
			      	minorTickFreq: 4
			    }, 
			    grid: {
			     	minorVerticalLines: true
			    }
			}
		);
	}

	temp_chart(document.getElementById("temp-chart"));

</script>

<div id="temp-chart">

</div>
