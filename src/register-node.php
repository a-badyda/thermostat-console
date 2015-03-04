<?php
//for testing purposes only, delete on release 
ini_set('display_errors',1);  
error_reporting(E_ALL);

//from stack overflow
//Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

?>
<!DOCTYPE html>
<html lang="en">
    
    <head>
 
        <!-- Style Sheets 
        <link rel="stylesheet" type="text/css" href="main/style.css" /> 
		-->

        <!-- Scripts --> 
        <script type="text/javascript" src="libraries/jquery-1.11.2.js"></script>
        
        <Title>thermostat setup</Title>
        
    </head>
    
    <script type="text/javascript">

		//bunch of global vars for now 
		var servIP = <?php print_r( "\"". $_SERVER['SERVER_ADDR'] ."\"");  ?>;
		var localIP= <?php print_r( "\"". get_client_ip() ."\"");  ?>;

		var apiKey= "777";
		var timeout= "1000";
		var nodeID= localStorage.getItem("nodeID");

		//array of all group IDs the thermostat needs to include 
		var allGroupID = [
			"0x0000", //basic
			"0x0201", //thermostat
			"0x0204", //thermostat interface
			"0x0402", //temperature sensing
			"0x0405", //relative humidity
			"0x0406", //occupancy sensing
		];

		//Thermostat Group Object with some more objects for groups in it
		var thermostatGroup={
			groupID : "0x0201",
			attrSet: {
				//start the information subGroup
				thermostatInfo:{ 
				 attrSetID: "0x0000",
				 attrSet: [
					 "0x0000", //local temperature
					 "0x0001", //outdoor temperature
					 "0x0002", //Occupancy
					 "0x0003", //AbsMinHeatSetpointLimit
					 "0x0004", //AbsMaxHeatSetpointLimit
					 "0x0005", //AbsMinCoolSetpointLimit
					 "0x0006", //AbsMaxCoolSetpointLimit
					 "0x0007", //PICoolingDemand
					 "0x0008", //PIHeatingDemand
				 ]
				},
				//start the settings subGroup
				thermostatSettings:{
				attrSetID: "0x0001",
				attrSet: [
					 "0x0010", //LocalTemperature Calibration
					 "0x0011", //OccupiedCooling Setpoint
					 "0x0012", //OccupiedHeating Setpoin
					 "0x0013", //UnoccupiedCooling Setpoint
					 "0x0014", //UnoccupiedHeating Setpoint
					 "0x0015", //MinHeatSetpoint Limit
					 "0x0016", //MaxHeatSetpoint Limit
					 "0x0017", //MinCoolSetpoint Limit
					 "0x0018", //MaxCoolSetpoint Limit
					 "0x0019", //MinSetpointDead Band
					 "0x001a", //RemoteSensing
					 "0x001b", //ControlSequenceOf Operation
					 "0x001c", //SystemMode
					 "0x001d", //AlarmMask
				 ]
				}
			}
		};

		var humidityGroup={
			groupID: "0x0405",
			attributeSet: {
				attrSetID: "0x0000",
				attrSet: [
					"0x0000", //MeasuredValue
					"0x0001", //MinMeasuredValue
					"0x0002", //MaxMeasuredValue
					"0x0003", //Tolerance
				]
			}
		};

		//check if the node ID is registered on the said device 
		if (localStorage.getItem("nodeID") === null) {
			//start registering everything 
  			RegisterNode();  			
		}

		function RegisterNode(){ //except i cant test it 
		    
		    $.ajax({
		    	url: 'http://'+servIP+
		    	 '/emoncms/register/register.json?apikey='+apiKey+
		    	 '&nodeip='+localIP+'&timeout='+timeout+'',

		    	type: 'post',
		    	async: true, cache: false,
		    	
		    	success: function(data){
		    		//do whatever to confirm
		    		console.log("request for node sent");
		    		console.log(data);
		    		nodeID = data;
		    		localStorage.setItem("nodeID", data);
		    		//thermostat info load in data  -- CONSIDER DEF. VALUES
				  	var groupID = thermostatGroup.groupID;
				  	var infoAttrID = thermostatGroup.attrSet.thermostatInfo.attrSetID;

				 	for (var i = thermostatGroup.attrSet.thermostatInfo.attrSet.length - 1; i >= 0; i--) {
				  		var attrNumber = thermostatGroup.attrSet.thermostatInfo.attrSet[i];

				  		RegisterAttribute(groupID, infoAttrID, attrNumber, 55);
				  	}

				  	//thermostat settings load in data -- CONSIDER DEF. VALUES
					var infoAttrID = thermostatGroup.attrSet.thermostatSettings.attrSetID;

				 	for (var i = thermostatGroup.attrSet.thermostatSettings.attrSet.length - 1; i >= 0; i--) {
				  		var attrNumber = thermostatGroup.attrSet.thermostatSettings.attrSet[i];

				  		RegisterAttribute(groupID, infoAttrID, attrNumber, 22);
				  	}
		    	},

		    	error: function(data){
		    		console.log("ERROR 10 - Node not registered");
		    	}
		    });
		}

		
		//call the function in a set of arrays 
		function RegisterAttribute(groupID, attrID, attrNumber, attrDefault){

			$.ajax({
				url: 'http://'+servIP+
				'/emoncms/register/setup.json?apikey='+apiKey+
				'&node='+nodeID+
				'&json={['+groupID+']['+attrID+']['+attrNumber+'],['+attrDefault+']}'+
				'&timeout='+timeout+'',

		    	type: 'post',
		    	async: true, cache: false,
		    	
		    	success: function(data){
		    		//do whatever to confirm
		    		console.log("request for attribute "+groupID+" "+attrNumber+" register sent");
		    		console.log(data);	

		    	}, 

		    	error: function(data){
		    		console.log("ERROR 10 - Attribute not registered");
		    	}
		    });

		}

		//this starts off the whole graphing process on the stats pageS
		RequestLocalTemp();

		//get rid of nodeIP setting later this is all due to testing
		//request for a local temperature
		function RequestLocalTemp(){
			
			var 
				groupID = "0x0201",
				attrID = "0x0000",
				attrNumber = "0x0000";	//only thing that's diff from call 2 
				nodeID = 5;	

			$.ajax({
				/*
				url: 'http://'+servIP+'/emoncms/feed/value.json?apikey='+apiKey+
				 '&node='+nodeID+
				 '&id='+groupID+''+attrID+''+attrNumber+''+nodeID+
				 '&timeout='+timeout+'',
				*/
				url: 'http://'+servIP+'/thermostat-console/src/test-data.php',

				type:'post',
				async: false, cache: false,

				success: function(data){
		    		storeData = data;
		    		RequestOutsideTempAndProcess(data);
		    	}, 

		    	error: function(data){
		    		console.log("ERROR 10 - Attribute not registered");
		    	},
		    	done: function(data){
		    		//callback(storeData);
		    		//return storeData;
		    	}
		    });
		}

		//request for the external temperature -- currently fetching same data as internal
		function RequestOutsideTempAndProcess(tempData){
			var 
				groupID = "0x0201",
				attrID = "0x0000",
				attrNumber = "0x0001";	
				nodeID = 5;		

			$.ajax({
				/*
				url: 'http://'+servIP+'/emoncms/feed/value.json?apikey='+apiKey+
				 '&node='+nodeID+
				 '&id='+groupID+''+attrID+''+attrNumber+''+nodeID+
				 '&timeout='+timeout+'',
				*/
				url: 'http://'+servIP+'/thermostat-console/test-data1.php',

				type:'post',
				async: false, cache: false,

				success: function(data){
		    		//do whatever to confirm
		    		GraphChart(tempData, data);
		    	}, 

		    	error: function(data){
		    		console.log("ERROR 10 - Attribute not registered");
		    	},
		    	done: function(data){
		    		//return storeData;
		    	}
		    });
		}


		function GraphChart(inside, outside){

			var markerFormatter = function(obj){
				return ' '+(obj.y).toFixed(0) + '%';
			}

			// Draw the graph
			graph = Flotr.draw(
				document.getElementById("temp-chart"), 
				[ 
					{ data: inside, label: "Indoor temperature" },
					{ data: outside, label: "Outdoor temperature" }
				], 
				
				{
					resolution: 2,
					fontSize: 6,

					points:{
						show: true
					},

					lines:{
						show: true
					},

				    xaxis : {
					    showLabels: true,
					    showMinorLabels: true,
					    labelsAngle: 0,
					    title: 'Time',
					    titleAngle: '0',
					    noTicks: 12,
					    //e is a modifier on the time - start at 24h ago +e
					    //if more than 24 (new day) elapse back to 0 (-24 on number)
					    tickFormatter: function (e){ 
					    	var temp = new Date();
					   		//start at 12 hours ago
					   		var time = parseInt(temp.getHours()) - 12;
					   		//add +1/2/3 etc modifier to get closer to current time 
					   		//+1 because e starts at 0 
					    	var time =+parseInt(e)+1;
					    	return ( time )+":00";
					    	
					    },

				   	},
					yaxis : {
					    showLabels: true,
					    showMinorLabels: true,
					    labelsAngle: 0,
					    //title: 'Temperature',
					    titleAngle: '90',
					   	//min: -20,
					    //max: 40,
					    noTicks: 10,
					    tickFormatter: function (e){ return e+"C"},

					},
					mouse : {
						track : true,
					   	trackFormatter: function (e){ 
					   		var temp = new Date();
					   		//start at 12 hours ago
					   		var time = parseInt(temp.getHours()) - 12;
					   		//add +1/2/3 etc modifier to get closer to current time 
					   		//+1 because e starts at 0 
					    	var time =+parseInt(e.x)+1;
					    	return e.y+" C, at " +( time )+":00";
					   	},
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
					grid: {
				     	minorVerticalLines: true
				    }
				}
			);
		}
				
    </script>
</html>
