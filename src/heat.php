<?php
	include("get-server.php");
	include( "register-node.php");
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style>
	#house-chart{
		float:left;
		width: 10px;
	}
	table{
		float:center;
	}
	td{
		float:center;
	}
	div{
		float:center;
	}
	

</style>

<script>	
	TextDataTemperature();

	//!!! start stack overflow code !!!//
    var PIXEL_RATIO = (function () {
    	var ctx = document.getElementById("house-chart").getContext("2d"),
        dpr = window.devicePixelRatio || 1,
        bsr = ctx.webkitBackingStorePixelRatio ||
              ctx.mozBackingStorePixelRatio ||
              ctx.msBackingStorePixelRatio ||
              ctx.oBackingStorePixelRatio ||
              ctx.backingStorePixelRatio || 1;

    return dpr / bsr;
	})();

	var PIXEL_RATIO1 = (function () {
    	var ctx = document.getElementById("thermostat-chart").getContext("2d"),
        dpr = window.devicePixelRatio || 1,
        bsr = ctx.webkitBackingStorePixelRatio ||
              ctx.mozBackingStorePixelRatio ||
              ctx.msBackingStorePixelRatio ||
              ctx.oBackingStorePixelRatio ||
              ctx.backingStorePixelRatio || 1;

    return dpr / bsr;
	})();


	CreateHiDPICanvas = function(w, h, which_canvas) {
	    
	    if(!which_canvas){
	    	ratio = PIXEL_RATIO; 
	    	var can = document.getElementById("house-chart");
	    }
	    else{
	    	ratio = PIXEL_RATIO1;
	    	var can = document.getElementById("thermostat-chart");
	    }
	    can.width = w * ratio;
	    can.height = h * ratio;
	    can.style.width = w + "px";
	    can.style.height = h + "px";
	    can.getContext("2d").setTransform(ratio, 0, 0, ratio, 0, 0);
	    return can;
	}

	//Create canvas with the device resolution.
	var canvas = CreateHiDPICanvas(300, 200);
	
	// !!! end stack overflow code !!! ///


	function DrawHouseImage(){
		//start drawing image to display temperature in graphical form
    	//var canvas = document.getElementById("house-chart");
      	var context = canvas.getContext("2d");

      	//draw a square
      	context.beginPath();
      	context.rect(30, 100, 140, 100); //x, y, width height 
      	context.fillStyle = "#B7DACB";
      	context.fill();
      	context.lineWidth = 2;
      	context.strokeStyle = "#B7DACB";
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
		imageTemp.src = "libraries/css/images/Temperature-2-icon32.png";
		imageTemp.onload = function() {
		  context.drawImage(imageTemp, 100, 115, 40, 30);
		  context.drawImage(imageTemp, 248, 135, 40, 30);
		};

		
		//humidity temperature
		context.fillStyle= "#9CA1FD";
		context.fillText(currentHu, 78, 180);
		//icon
		var imageObj = new Image();
		imageObj.src = "libraries/css/images/Humidity-icon32px.png";
		imageObj.onload = function() {
		  context.drawImage(imageObj, 105, 150, 40, 30);
		};

		
		//outside temperature
		context.fillStyle= "#A5BA00";
		context.fillText(currentOut, 228, 160);
		//icon where the inside temperature 
		
	}

	DrawHouseImage();

	//start drawing the thermostat
	
	function DrawThermostat(){
		var canvas = CreateHiDPICanvas(300, 200, 1);
		var ctx = canvas.getContext("2d");

		var canvasOffset = $("#thermostat-chart").offset();
		var offsetX = canvasOffset.left;
		var offsetY = canvasOffset.top;

		var startX;
		var startY;
		var isDown = false;

		var cx = canvas.width / 2;
		var cy = canvas.height / 2;
		var w;
		var h;
		var r = 0;

		var img = new Image();
		img.onload = function () {
		    w = img.width / 2;
		    h = img.height / 2;
		    draw();
		}
		img.src = "libraries/css/images/thermostat-knob.png";


		function draw() {
		    ctx.clearRect(0, 0, canvas.width, canvas.height);
		    drawRect();
		}

		function drawRect() {
		    ctx.save();
		    ctx.translate(cx, cy);
		    ctx.rotate(r);
		    ctx.drawImage(img, 0, 0, img.width, img.height, -w / 2, -h / 2, w, h);

		    ctx.restore();
		}


		//start handling mouse events 
		function handleMouseDown(e) {
		    mouseX = parseInt(e.clientX - offsetX)/2;
		    mouseY = parseInt(e.clientY - offsetY)/2;
		    isDown = true;	
		}

		function handleMouseUp(e) {
		    isDown = false;
		}

		function handleMouseOut(e) {
		    isDown = false;
		}

		function handleMouseMove(e) {
		    if (!isDown) {
		        return;
		    }

		    mouseX = parseInt(e.clientX - offsetX)/2;
		    mouseY = parseInt(e.clientY - offsetY)/2;
		    var dx = mouseX - cx;
		    var dy = mouseY - cy;
		    var angle = Math.atan2(dy, dx);
		    r = angle*6;
		    //transform angle to rad again and move to input fields val
		    //add boundaries to turning 
		    if(r < 5.5 && r > 0){
		    	
		    	temp= (r+1)*5;
		    	draw();
		    	
		    	//normalize values to only 7-32 //currently hard-coded
		    	if(temp<7){temp=7}
		    	else if(temp>32){temp=32}
		    	else{}

		    	//print out in the text box
		    	$(document).find("#newHeat").val(Math.ceil(temp));

		    }
		}

		$("#thermostat-chart").mousedown(function (e) {
		    handleMouseDown(e);
		});
		$("#thermostat-chart").mousemove(function (e) {
		    handleMouseMove(e);
		});
		$("#thermostat-chart").mouseup(function (e) {
		    handleMouseUp(e);
		});
		$("#thermostat-chart").mouseout(function (e) {
		    handleMouseOut(e);
		});
	}

	//DrawThermostat();




	//handle max min heat call & printing 
	function PrintmaxMinHeat(){
		//max&min heat exists 
		$(document).find("#maxH").text(localStorage.getItem("maxHeat"));
		$(document).find("#maxH").css("color","red");

		$(document).find("#minH").text(localStorage.getItem("minHeat"));
		$(document).find("#minH").css("color","blue");

		$(document).find("#currentH").text(localStorage.getItem("insideNow").substr(localStorage.getItem("insideNow").indexOf(",")+1));
		$(document).find("#currentH").css("color","orange");
	}

	RequestMaxMinHeat();
	PrintmaxMinHeat();

	console.log("heating loaded"); 
</script>

<h2> Heating Control </h2>

<p class="local-conditions-text-data"></p>

<canvas id="house-chart"></canvas>

<canvas id="thermostat-chart"></canvas>

<form id="heat-data">
 <table> 
 	
 	<tr>
 		<td>The thermostat is set to <span id="currentH"> </span>&degC.</td>
 		<td>Maxium temperature is <span id="maxH"> </span>&degC.</td>
 		<td>Minimum temperature is <span id="minH"> </span>&degC.</td>
 	</tr>

    <label for="flip-checkbox-1">Flip toggle switch checkbox:</label>
    <input type="checkbox" data-role="flipswitch" name="flip-checkbox-1" id="flip-checkbox-1">
    ><input type="submit" value="Submit"/>
 	<!--
 	<tr>	
		<td>Enter Temperature: </td>
		<td><input id="newHeat" type="text" name="newHeat" maxlenght="2" 
			size="3" value="" /></td>
		<td><input type="submit" value="Submit"/></td>
	</tr>
	-->
 </table>
</form>

