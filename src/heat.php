<?php
	include("register-node.php");
?>
<script>
	console.log("heating loaded"); 
	showTemperature();
</script>

    <script>

    	function drawHouseImage(){
    		//start drawing image to display temperature in graphical form
	    	var canvas = document.getElementById('house-chart');
	      	var context = canvas.getContext('2d');

	      	//draw a square
	      	context.beginPath();
	      	context.rect(10, 70, 80, 60); //x, y, width height 
	      	context.fillStyle = '#B7DACB';
	      	context.fill();
	      	context.lineWidth = 2;
	      	context.strokeStyle = '#B7DACB';
	      	context.stroke();

	      	//draw a triangle
	      	context.moveTo(0,70);
		    context.lineTo(100,70);
		    context.lineTo(50,35);
		    context.fill();

		    //draw a cloud
		     // begin custom shape
	      	context.beginPath();
	      	context.moveTo(120, 80);
	      	context.lineTo(5,5);
	      	//context.bezierCurveTo();
	      	/*
	      	context.bezierCurveTo(130, 100, 130, 150, 230, 150); //cx1, cy1, cx2, cy2, x, y
	      	context.bezierCurveTo(250, 180, 320, 180, 340, 150);
	      	context.bezierCurveTo(420, 150, 420, 120, 390, 100);
	      	context.bezierCurveTo(430, 40, 370, 30, 340, 50);
	      	context.bezierCurveTo(320, 5, 250, 20, 250, 50);
	      	context.bezierCurveTo(200, 5, 150, 20, 170, 80);
			*/

	      	// complete custom shape
	      	context.closePath();
	      	context.lineWidth = 1;
	      	context.fill();
	      	context.stroke();


		    //draw the sun

		    //draw temperatures & inside humidity
		}

		drawHouseImage();

    </script>

<canvas id="house-chart" class="chart"></canvas>

<p id="local-conditions-text-data">It is currently 
	<span id="temperature-inside"></span>&degC inside, 
	and 
	<span id="temperature-outside"></span>&degC outside.
	The room humidity is at <span id="humidity-now"></span>%.
</p>



