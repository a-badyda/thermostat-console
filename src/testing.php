<?php


?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
 
        <!-- Style Sheets 
        <link rel="stylesheet" type="text/css" href="main/style.css" /> 
		-->
		<!-- 
       special meta tags should be added into HTML that is supposed to be 
       loaded on mobile devices 
    -->
    	<meta name="viewport" content="width=device-width,initial-scale=1.0, user-scalable=0"/>
    	<meta name="msapplication-tap-highlight" content="no" />
 
        
        <!-- Scripts --> 
        <script type="text/javascript" src="libraries/jquery-1.11.2.js"></script>
        <script type="text/javascript" src="libraries/zebra.runtime/zebra.min.js"></script>
        <script type="text/javascript" src="libraries/flotr2.min.js"></script>
        

        <Title>TESTING</Title>
        
    </head>

    <script>
	    zebra.ready(function() {
	    	// create canvas and set border layout for root panel
			var r = new zebra.ui.zCanvas(150, 250).root;
			r.setLayout(new zebra.layout.BorderLayout());
			 
			// create list UI component
			var list = new zebra.ui.List();
			 
			// add 100 items to the UI list component
			for(var i=0; i<100; i++) {
			   list.model.add("List item " + i);
			}
			 
			// add scroll panel to root panel and add 
			// list to the scroll panel  
			r.add(zebra.layout.CENTER, 
			      new zebra.ui.ScrollPan(list));
		});

	</script>
</html>
