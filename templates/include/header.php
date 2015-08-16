<!DOCTYPE html>
  <head>
  		<script type="text/javascript">
            var start = Date.now();
        </script>
  	<meta charset="utf-8">
    <title><?php echo htmlspecialchars( $results['pageTitle'] )?></title>
    <base href="//localhost/mvc2/" />
    <!-- FOR THE ONLINE MODE NEED TO CHANGE THE BASE (IN THE ADMIN.PHP AS WELL) <base href="//your.domain.here" /> --> 
    <link rel="stylesheet" type="text/css" href="styles/style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link href="templates/scripts/photoswipe/photoswipe.css" type="text/css" rel="stylesheet" />
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="templates/scripts/lazyload-1.9.5/jquery.lazyload.min.js"></script>
	<script type="text/javascript" src="templates/scripts/photoswipe/klass.min.js"></script>
	<script type="text/javascript" src="templates/scripts/photoswipe/code.photoswipe.jquery-3.0.5.min.js"></script>
  </head>
  <body>
  	<header>
  		<?php include "templates/include/menu.php"; ?>
  		<h1><a href="./<?php echo $_SESSION['lang'] ?>"> <?php echo SITE_NAME ?></a></h1>
    </header>
    <div id="container">
	  <div><a href="./en">EN</a> | <a href="./hu">HU</a></div>
      
