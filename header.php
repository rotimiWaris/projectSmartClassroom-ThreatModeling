<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
		<!-- BASICS -->
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="">
        <link rel="icon" href="img/favicon.ico">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />	
		<link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/bootstrap-theme.css">
        <link rel="stylesheet" href="css/style.css">
		<!-- skin -->
		<link rel="stylesheet" href="skin/default.css">
    </head>
	 
    <body>
		<section id="header" class="appear"></section>
		<div class="navbar navbar-fixed-top" role="navigation" data-0="line-height:100px; height:100px; background-color:rgba(0,0,0,0.3);" data-300="line-height:60px; height:60px; background-color:rgba(0,0,0,1);">
			 <div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="fa fa-bars color-white"></span>
					</button>
					<a href="index.php"><img data-0="line-height:90px; height:90px;" data-300="line-height:50px; height:70px;" width="100px" src="img/about.jpg" alt="NACOS">
					</a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav" data-0="margin-top:20px;" data-300="margin-top:5px;">
						<li class="active"><a href="index.php">Home</a></li>
						<?php if (isset($user)): ?>
							<li><a href="dashboard.php">Dashboard</a></li>
						<?php else: ?>
							<li><a href="signup.php">Signup</a></li>
						<?php endif; ?>
						<!-- <li><a href="#section-works">Portfolio</a></li>
						<li><a href="#section-contact">Contact</a></li> -->
					</ul>
				</div><!--/.navbar-collapse -->
			</div>
		</div>
        <a href="#header" class="scrollup"><i class="fa fa-chevron-up"></i></a>	

        <script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script src="js/jquery.js"></script>
        <script src="js/jquery.easing.1.3.js"></script>
        <script src="js/bootstrap.min.js"></script>
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
        </body>
</html>