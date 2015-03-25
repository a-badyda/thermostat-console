<?php
//for testing purposes only, delete on release 
ini_set("display_errors",1);  
error_reporting(E_ALL);

//from stack overflow
//Function to get the client IP address
function get_client_ip() {
    $ipaddress = "";
    if (getenv("HTTP_CLIENT_IP"))
        $ipaddress = getenv("HTTP_CLIENT_IP");
    else if(getenv("HTTP_X_FORWARDED_FOR"))
        $ipaddress = getenv("HTTP_X_FORWARDED_FOR");
    else if(getenv("HTTP_X_FORWARDED"))
        $ipaddress = getenv("HTTP_X_FORWARDED");
    else if(getenv("HTTP_FORWARDED_FOR"))
        $ipaddress = getenv("HTTP_FORWARDED_FOR");
    else if(getenv("HTTP_FORWARDED"))
       $ipaddress = getenv("HTTP_FORWARDED");
    else if(getenv("REMOTE_ADDR"))
        $ipaddress = getenv("REMOTE_ADDR");
    else
        $ipaddress = "UNKNOWN";
    return $ipaddress;
}

echo("
    <script>
        localStorage.setItem( 'CLIENT_ADDR', \"". get_client_ip()."\");
        localStorage.setItem( 'SERVER_ADDR', \"". $_SERVER["SERVER_ADDR"]."\");
    </script>
");
?>