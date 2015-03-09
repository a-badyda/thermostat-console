<?php
	include("register-node.php");
?>

<style>
	#house-chart{
		float:left;
		width: 10px;
	}
	#thermostat-chat{
		float:right;
		width:300px;
		height:300px;

    	border:1px solid red;
	}

</style>

<script>
	console.log("heating loaded"); 
	textDataTemperature();

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

	function drawThermostat(){

		var context = document.getElementById('thermostat-chart').getContext('2d');

		//draw a circle
      	context.arc( 230, 70, 70, 0, Math.PI * 2);
		context.fillStyle = "#899EA3";
		context.fill();

		//draw the pointer (diamond shaped)
		//draw a triangle
      	context.moveTo(200, 50);
	    context.lineTo(230,50);
	    context.lineTo(230,145); //bottom pointer
	    context.strokeStyle = "#FFF";
	    context.fill();
	    context.stroke();

	    //
	}

	drawThermostat();


	var canvas = document.getElementById("thermostat-chart");
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
	    drawRotationHandle(true);
	    drawRect();
	}

	function drawRect() {
	    ctx.save();
	    ctx.translate(cx, cy);
	    ctx.rotate(r);
	    ctx.drawImage(img, 0, 0, img.width, img.height, -w / 2, -h / 2, w, h);
	    //    ctx.fillStyle="yellow";
	    //    ctx.fillRect(-w/2,-h/2,w,h);
	    ctx.restore();
	}

	function drawRotationHandle(withFill) {
	    ctx.save();
	    ctx.translate(cx, cy);
	    ctx.rotate(r);
	    ctx.beginPath();
	    ctx.moveTo(0, -1);
	    ctx.lineTo(w / 2 + 20, -1);
	    ctx.lineTo(w / 2 + 20, -7);
	    ctx.lineTo(w / 2 + 30, -7);
	    ctx.lineTo(w / 2 + 30, 7);
	    ctx.lineTo(w / 2 + 20, 7);
	    ctx.lineTo(w / 2 + 20, 1);
	    ctx.lineTo(0, 1);
	    ctx.closePath();
	    if (withFill) {
	        ctx.fillStyle = "blue";
	        ctx.fill();
	    }
	    ctx.restore();
	}



	function handleMouseDown(e) {
	    mouseX = parseInt(e.clientX - offsetX);
	    mouseY = parseInt(e.clientY - offsetY);
	    drawRotationHandle(false);
	    isDown = ctx.isPointInPath(mouseX, mouseY);
	    console.log(isDown);
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

	    mouseX = parseInt(e.clientX - offsetX);
	    mouseY = parseInt(e.clientY - offsetY);
	    var dx = mouseX - cx;
	    var dy = mouseY - cy;
	    var angle = Math.atan2(dy, dx);
	    r = angle;
	    draw();
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

</script>


<h2> Heating Control </h2>

<p class="local-conditions-text-data"></p>

<canvas id="house-chart" class="chart"></canvas>

<canvas id="thermostat-chart" class="chart"></canvas>

<br /><br /><br />
<div id="heating-data"></div>