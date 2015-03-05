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
	      	context.beginPath();
	      	context.moveTo(110, 30);
	      	//do all the curves
	      	context.quadraticCurveTo(123, 2, 130, 30);
            context.quadraticCurveTo(153, 10, 160, 30);
            context.quadraticCurveTo(193, 40, 160, 55);
            context.quadraticCurveTo(155, 75, 140, 55);
            context.quadraticCurveTo(125, 80, 110, 55);
            context.quadraticCurveTo(80, 50, 110, 30);     

	      	context.lineWidth = 1;
	      	context.fill();
	      	context.stroke();

		    //draw temperatures & inside humidity
		    var currentOut = localStorage.getItem("outsideNow").substr(localStorage.getItem("outsideNow").indexOf(",")+1); 
			var currentIn = localStorage.getItem("insideNow").substr(localStorage.getItem("insideNow").indexOf(",")+1); 
			var currentHu = localStorage.getItem("humidNow");
			
			//inside temperature
			context.font="18px Verdana";			
			context.fillStyle= "#F0A400";
			context.fillText(currentIn, 25, 85);
			//icon
			var imageTemp = new Image();
			imageTemp.src = 'libraries/css/images/Temperature-2-icon32.png';
			imageTemp.onload = function() {
			  context.drawImage(imageTemp, 45, 71, 20, 15);
			  context.drawImage(imageTemp, 140, 86, 20, 15);
			};


			//humidity temperature
			context.fillStyle= "#9CA1FD";
			context.fillText(currentHu, 25, 115);
			//icon
			var imageObj = new Image();
			imageObj.src = 'libraries/css/images/Humidity-icon32px.png';
			imageObj.onload = function() {
			  context.drawImage(imageObj, 47, 100, 20, 15);
			};

			//outside temperature
			context.fillStyle= "#A5BA00";
			context.fillText(currentOut, 120, 100);
			//icon where the inside temperature 
			

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



