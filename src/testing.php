<?php


?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
 
        <!-- Style Sheets 
        <link rel="stylesheet" type="text/css" href="main/style.css" /> 
		-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
        <meta name="msapplication-tap-highlight" content="no" />
        
        <!-- Scripts --> 
        <script type="text/javascript" src="libraries/jquery-1.11.2.js"></script>
        <script type="text/javascript" src="libraries/zebra.runtime/zebra.min.js"></script>
        <script type="text/javascript" src="libraries/flotr2.min.js"></script>
        

        <Title>TESTING</Title>
        
    </head>

    <script>
	    zebra.ready(function() {
	    	// create canvas 400x700 pixels
	    	var canvas = new zebra.ui.zCanvas(400, 700);
	 
	    	// fill canvas root panel with UI components
	    	canvas.root.setLayout(new zebra.layout.BorderLayout(8));
	    	canvas.root.add(zebra.layout.CENTER, new zebra.ui.TextArea(""));
	    	canvas.root.add(zebra.layout.BOTTOM, new zebra.ui.Button("Clean"));

	    	// force canvas to fill all available page space
     		canvas.fullScreen();  
		});

	</script>
</html>
