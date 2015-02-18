<?php

?>
<script> console.log("booking loaded"); </script>

<!-- makeshift CSS to center the login on site -->
<style type="text/css">
    #login-data{
        margin: 20% auto;
        width: 100px;
    }
</style>

<!-- change action to real redirect later -->
<form id="login-data" method="POST" action="index.php"> 

	<p>
		Login:<input type="text" name="login" placeholder="Username" autocapitalize="off"/>
	</p>

	<p>
		Password: <input type="password" name="pass" placeholder="Password" autocapitalize="off"/>
		<input type="submit" value="Log In" name="login" />
	</p>
	<br/>

</form>

