<?php

?>
<<<<<<< HEAD
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
=======
>>>>>>> parent of 48b18dd... Produced a graph, working on configuring data array

<p> hello </p>
<script> console.log("stats loaded"); </script>

<<<<<<< HEAD
<script> console.log("stats loaded"); 
	
	var graph;

	function temp_chart(container) {

		var	
			derp = [],//[0,3,10,0],
		    inside = [],
		    outside = [],
		    i;

		console.log(derp);
		
		for (var j = 0; j < 24; j += 0.1) {
		    inside.push([derp[j], j]);
		    //outside.push([j, 3*j+Math.sin(2*j)*2 - 5]);
		}

		var markerFormatter = function(obj){
			// return obj.y.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
			return ' '+(obj.y).toFixed(0) + '%';
		}

		// Draw the graph
	  	graph = Flotr.draw(
		    container,
		    [ 
		    	{data: inside, label: 'inside'}, 
		    	{data: outside, label: 'outside'}
			],
			// Paste Line Graph Options between the braces below
			{
				title: 'Temperature',
				subtitle: '24 hour Log of Inside and Outside temperature',
				shadowSize: 4,
				HtmlText: false,
				resolution: 4,
				fontSize: 9,
				fontColor: '#000000',
				colors: ['#ff0000', '#008000', '#0000ff',
				'#ffa500', '#800080', '#ffff00'],
				lines: {
				   	show: true,
				   	lineWidth: 2,
				   	fill: false,
				   	fillBorder: false,
				   	fillColor: null,
				   	fillOpacity: 0.4,
				   	steps: false,
				   	stacked: false,
				   },
				grid: {
				   	color: '#545454',      
				   	backgroundColor: null, 
				   	backgroundImage: null, 
				   	watermarkAlpha: 0.4,  
				   	tickColor: '#DDDDDD',  
				   	labelMargin: 3,        
				   	verticalLines: true,   
				   	horizontalLines: true, 
				   	outlineWidth: 0,       
				   	outline : 'nsew',      
				   	circular: false        
				   },
				xaxis : {
				    showLabels: true,
				    showMinorLabels: false,
				    labelsAngle: 0,
				    title: 'temperature',
				    titleAngle: '0',
				   },
				yaxis : {
				    showLabels: true,
				    showMinorLabels: false,
				    labelsAngle: 0,
				    title: 'hour',
				    titleAngle: '90',
				   },
				   mouse : { 
					   track : true,
					   trackFormatter: function (e){return e.y;},
					   trackDecimals: 0,
					   relative: false,
					   position: 'se',
					   lineColor: '#ffff00',
					   sensibility: 2,
					   trackY: true,
					   radius: 3,
					   margin: 5,
					   mouseTextColor: '#ffffff',
					   mouseBGColor: '#000000',
					   boxAlpha: '0.8',
					   fillColor: null,
					   fillOpacity: 0.8
				    },
				legend : {
				   show: true,
				   position: 'nw',
				   labelBoxBorderColor: '#cccccc',
				   labelBoxWidth: 14,
				   labelBoxHeight: 10,
				   labelBoxMargin: 5,
				   margin: 5,
				   backgroundColor: '#fff8b8',
				   backgroundOpacity: 0.85,
				}
			}
		);

	}
	temp_chart(document.getElementById("temp-chart"));



</script>

<div id="temp-chart">

</div>
=======
>>>>>>> parent of 48b18dd... Produced a graph, working on configuring data array
