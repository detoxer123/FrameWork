<!DOCTYPE html>
  <head>
    <title><?php echo htmlspecialchars( $results['pageTitle'] )?></title>
    <link rel="stylesheet" type="text/css" href="styles/admin.css" />
    <link href="templates/scripts/photoswipe/photoswipe.css" type="text/css" rel="stylesheet" />
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  	<base href="//localhost/mvc2/" />
 	<!-- FOR THE ONLINE MODE NEED TO CHANGE THE BASE <base href="//your.domain.here" /> --> 
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="templates/scripts/lazyload-1.9.5/jquery.lazyload.min.js"></script>
    <script type="text/javascript" src="templates/scripts/photoswipe/klass.min.js"></script>
	<script type="text/javascript" src="templates/scripts/photoswipe/code.photoswipe.jquery-3.0.5.min.js"></script>
	<script type="text/javascript" src="templates/scripts/bootstrap.min.js"></script>
  </head>
  <body>
	    <?php include "templates/admin/include/adminMenu.php" ?>
	    <header id="adminHeader" class="col-sm-9 col-sm-offset-3 navbar-fixed-top">
	    	<div class="navbar-left"><h1><a href="."><?php echo SITE_NAME ?></a></h1></div>
	    	<div class="navbar-right">
	    		<p>
	    		<div class="dropdown">
	    			Signed in as
		    		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo htmlspecialchars( $_SESSION['username']) ?> <span class="caret"></span></button>
		    		<ul  class="dropdown-menu" role="menu" aria-labelledby="menu1">
		    			<li><a href="admin.php?action=logout"?>Log Out</a></li>
		    		</ul>
		    	</div>
	    		</p>
	    		
	    	</div>
		</header>
		
	<!-- <div id="container"> -->