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

	RequestLocalTemp();
	RequestOutsideTemp();

	$.when( RequestLocalTemp(), RequestOutsideTemp() ).done(function( inside, outside ) {
  		// inside and outside are arguments resolved for the page1 and page2 ajax requests, respectively.
  		// Each argument is an array with the following structure: [ data, statusText, jqXHR ]
	  	console.log(inside);
	});


/*

	function temp_chart(container) {

		var	derp = [];
		var inside =[];
		var outside = [];
		var i;

	  	RequestLocalTemp(inside);

		for (var j = 0; j < 24; j += 0.1) {
		    //inside.push([derp[j], j]);
		}

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
*/

	//temp_chart(document.getElementById("temp-chart"));

</script>

<div id="temp-chart">

</div>
