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
img.src = "http://s12.postimg.org/k0c266hql/thermostat_knob.png";


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
	    drawRotationHandle(true);
	    isDown = ctx.isPointInPath(mouseX, mouseY);
	    console.log(mouseX+ " "+mouseY);
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