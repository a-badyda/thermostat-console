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

		//test //console.log(localIP+" "+ servIP);

		var apiKey= "777";
		var timeout= "100";

		function SendRegisterNode(){ //except i cant test it 
		    
		    $.ajax({
		    	url: 'http://'+servIP+
		    	 '/emoncms/register/register.json?apikey='+apiKey+
		    	 '&nodeip='+localIP+'&timeout='+timeout+'',
		    	type: 'post', async: false, cache: false,
		    	
		    	success: function(){
		    		//do whatever to confirm
		    		console.log("request sent");
		    		//need to also pick up the request - have a get for that later
		    		CheckNodeID();
		    	}
		    });
		}

		//leave blank for now 
		function CheckNodeID(){
			//how -- check with docs
		}

		SendRegisterNode();

    </script>
</html>
