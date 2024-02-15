<?php
session_start();
if (isset($_SESSION["users_id"])) {
    
    $mysqli = require __DIR__ . "/db.php";
    
    $sql = "SELECT * FROM users
            WHERE id = {$_SESSION["users_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

if (isset($_SESSION["admins_id"])) {
    
  $mysqli2 = require __DIR__ . "/db.php";
  
  $sql2 = "SELECT * FROM admins
          WHERE id = {$_SESSION["admins_id"]}";
          
  $result2 = $mysqli2->query($sql2);
  
  $admin = $result2->fetch_assoc();
}

?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
		<!-- BASICS -->
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Smart Classroom Threat Modelling Framework - Home</title>
        <meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />	
		<link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/bootstrap-theme.css">
        <link rel="stylesheet" href="css/style.css">
		<!-- skin -->
		<link rel="stylesheet" href="skin/default.css">
        <style>
        ul.list {
            list-style-type: none;
            padding: 0;
        }

        li.list-items {
            margin-bottom: 8px;
            padding: 8px;
            background-color: #007BFF;
            color: #fff;
            border-radius: 4px;
        }
        </style>
    </head>
	 
    <body>
        <?php
        include('header.php');
        ?>

		<section class="featured">
			<div class="container"> 
				<div class="row mar-bot40">
					<div class="col-md-6 col-md-offset-3">
						
						<div class="align-center">
							<i class="fa fa-bluetooth fa-5x mar-bot20"></i>
							<h3 class="slogan">Smart Classroom Threat Modelling Framework</h3>
							<h3 style="color: white;" class="text-bold">Bluetooth Connection Security</h3>
                            <p>
                                In the context of smart classrooms, Bluetooth connections play a crucial role in facilitating communication and control among devices. However, it's essential to address potential security threats associated with Bluetooth technology.
                            </p>

						</div>
					</div>
				</div>
			</div>
		</section>
		
        <section id="section-services" class="section pad-bot30 bg-white">
		<div class="container"> 
		
			<div class="row mar-bot40">
				<div class="col-lg-4" >
					<div class="align-center">
						<h4 class="text-bold">Potential Threats</h4>
						<ul class="list">
                            <li class="list-items">Unauthorized Access</li>
                            <li class="list-items">Eavesdropping</li>
                            <li class="list-items">Bluejacking and Bluesnarfing</li>
                        </ul>
					</div>
				</div>
					
				<div class="col-lg-4" >
					<div class="align-center">
						<h4 class="text-bold">Security Measures</h4>
						<ul class="list">
                            <li class="list-items">Encryption</li>
                            <li class="list-items">Authentication</li>
                            <li class="list-items">Regular Updates</li>
                        </ul>
					</div>
				</div>
			
				<div class="col-lg-4" >
					<div class="align-center">
						<h4 class="text-bold">Integration with Overall Framework</h4>
						<p>Consider the entire ecosystem of the smart classroom system, evaluating how Bluetooth connections interact with other components to ensure comprehensive security.
						</p>
					</div>
				</div>
			
			</div>	

		</div>
		</section>

		<section id="footer" class="section footer">
		<div class="container">

			<div class="row align-center copyright">
					<div class="col-sm-12"><p>&copy; 2024 Smart Classroom Threat Modelling Framework</p></div>
			</div>
		</div>

	</section>
	<a href="#header" class="scrollup"><i class="fa fa-chevron-up"></i></a>	

	<!--<script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	<script src="js/jquery.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASm3CwaK9qtcZEWYa-iQwHaGi3gcosAJc&sensor=false"></script>
	<script src="js/jquery.isotope.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
	<script src="js/fancybox/jquery.fancybox.pack.js"></script>
	<script src="js/skrollr.min.js"></script>		
	<script src="js/jquery.scrollTo-1.4.3.1-min.js"></script>
	<script src="js/jquery.localscroll-1.2.7-min.js"></script>
	<script src="js/stellar.js"></script>
	<script src="js/jquery.appear.js"></script>
	<script src="js/validate.js"></script>
    <script src="js/main.js"></script>
         <script type="text/javascript">
            // When the window has finished loading create our google map below
            google.maps.event.addDomListener(window, 'load', init);
        
            function init() {
                // Basic options for a simple Google Map
                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                var mapOptions = {
                    // How zoomed in you want the map to start at (always required)
                    zoom: 11,

                    // The latitude and longitude to center the map (always required)
                    center: new google.maps.LatLng(40.6700, -73.9400), // New York

                    // How you would like to style the map. 
                    // This is where you would paste any style found on Snazzy Maps.
                    styles: [	{		featureType:"all",		elementType:"all",		stylers:[		{			invert_lightness:true		},		{			saturation:10		},		{			lightness:30		},		{			gamma:0.5		},		{			hue:"#1C705B"		}		]	}	]
                };

                // Get the HTML DOM element that will contain your map 
                // We are using a div with id="map" seen below in the <body>
                var mapElement = document.getElementById('map');

                // Create the Google Map using out element and options defined above
                var map = new google.maps.Map(mapElement, mapOptions);
            }
        </script> -->
	</body>
</html>