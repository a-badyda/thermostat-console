<?php
	include("register-node.php");
?>
<script>
	console.log("heating loaded"); 
	textDataTemperature();
</script>

    <script>

    	//!!! start stack overflow code !!!//
	    var PIXEL_RATIO = (function () {
	    	var ctx = document.getElementById('house-chart').getContext("2d"),
	        dpr = window.devicePixelRatio || 1,
	        bsr = ctx.webkitBackingStorePixelRatio ||
	              ctx.mozBackingStorePixelRatio ||
	              ctx.msBackingStorePixelRatio ||
	              ctx.oBackingStorePixelRatio ||
	              ctx.backingStorePixelRatio || 1;

	    return dpr / bsr;
		})();


		createHiDPICanvas = function(w, h, ratio) {
		    if (!ratio) { ratio = PIXEL_RATIO; }
		    var can = document.getElementById('house-chart');
		    can.width = w * ratio;
		    can.height = h * ratio;
		    can.style.width = w + "px";
		    can.style.height = h + "px";
		    can.getContext("2d").setTransform(ratio, 0, 0, ratio, 0, 0);
		    return can;
		}

		//Create canvas with the device resolution.
		var canvas = createHiDPICanvas(300, 300);

		//Create canvas with a custom resolution.
		var myCustomCanvas = createHiDPICanvas(500, 200, 4);
		// !!! end stack overflow code !!! ///


		function drawHouseImage(){
    		    		//start drawing image to display temperature in graphical form
	    	//var canvas = document.getElementById('house-chart');
	      	var context = canvas.getContext('2d');

	      	//draw a square
	      	context.beginPath();
	      	context.rect(30, 100, 140, 100); //x, y, width height 
	      	context.fillStyle = '#B7DACB';
	      	context.fill();
	      	context.lineWidth = 2;
	      	context.strokeStyle = '#B7DACB';
	      	context.stroke();

	      	//draw a triangle
	      	context.moveTo(10,110);
		    context.lineTo(190,110);
		    context.lineTo(95,35);
		    context.fill();

		    //draw the first cloud
	      	context.beginPath();
	      	context.moveTo(210, 30);
	      	//do all the curves
	      	context.quadraticCurveTo(223, 2, 230, 30);
            context.quadraticCurveTo(253, 10, 260, 30);
            context.quadraticCurveTo(293, 40, 260, 55);
            context.quadraticCurveTo(255, 75, 240, 55);
            context.quadraticCurveTo(225, 80, 210, 55);
            context.quadraticCurveTo(180, 50, 210, 30);
            //fill the element etc.
	      	context.lineWidth = 1;
	      	context.fill();
	      	context.stroke();
            
            //draw cloud number 2
            context.beginPath();
	      	context.moveTo(310, 78);
	      	//do all the curves
	      	context.quadraticCurveTo(323, 52, 330, 80);
            context.quadraticCurveTo(353, 60, 360, 80);
            context.quadraticCurveTo(393, 90, 360, 105);
            context.quadraticCurveTo(355, 115, 340, 105);
            context.quadraticCurveTo(325, 120, 310, 105);
            context.quadraticCurveTo(280, 100, 310, 80);
            //fill the element etc.
	      	context.lineWidth = 1;
	      	context.fill();
	      	context.stroke();

		    //draw temperatures & inside humidity
		    var currentOut = localStorage.getItem("outsideNow").substr(localStorage.getItem("outsideNow").indexOf(",")+1); 
			var currentIn = localStorage.getItem("insideNow").substr(localStorage.getItem("insideNow").indexOf(",")+1); 
			var currentHu = localStorage.getItem("humidNow");
			
			//inside temperature
			context.font="30px Impact";			
			context.fillStyle= "#F0A400";
			context.fillText(currentIn, 80, 140);
			//icon
			var imageTemp = new Image();
			imageTemp.src = 'libraries/css/images/Temperature-2-icon32.png';
			imageTemp.onload = function() {
			  context.drawImage(imageTemp, 100, 115, 40, 30);
			  context.drawImage(imageTemp, 248, 135, 40, 30);
			};

			
			//humidity temperature
			context.fillStyle= "#9CA1FD";
			context.fillText(currentHu, 78, 180);
			//icon
			var imageObj = new Image();
			imageObj.src = 'libraries/css/images/Humidity-icon32px.png';
			imageObj.onload = function() {
			  context.drawImage(imageObj, 105, 150, 40, 30);
			};

			
			//outside temperature
			context.fillStyle= "#A5BA00";
			context.fillText(currentOut, 228, 160);
			//icon where the inside temperature 
			

		}

		drawHouseImage();

    </script>


<h2> Heating Control </h2>

<p class="local-conditions-text-data"></p>

<canvas id="house-chart" class="chart"></canvas>



