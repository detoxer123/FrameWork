<?php
	header('Content-Type: text/html; charset=UTF-8');
    ini_set("display_errors", TRUE);
    define( "DB_DSN", "mysql:host=localhost;dbname=mycms" );
	define( "DB_USERNAME", "root" );
	define( "DB_PASSWORD", "" );
	define( "CLASS_PATH", "classes" );
	define( "TEMPLATE_PATH", "templates" );
	define( "HOMEPAGE_NUM_ARTICLES", 10 );
	define( "ADMIN_USERNAME", "admin" );
	define( "ADMIN_PASSWORD", "admin" );
	define( "ARTICLE_IMAGE_PATH", "images/articles" );
	define( "GALLERY_PATH","images/galleries");
	define( "IMG_TYPE_FULLSIZE", "fullsize" );
	define( "IMG_TYPE_THUMB", "thumb" );
	define( "ARTICLE_THUMB_WIDTH", 120 );
	define( "GALLERY_THUMB_WIDTH", 300 );
	define( "JPEG_QUALITY", 85 );
	define( "ITEM_PER_GALLERY", 15);
	define( "ITEM_PER_ARCHIVE", 5);
	define( "SITE_NAME", "Probe Pages");
	require( CLASS_PATH . "/Article.php" );
	require( CLASS_PATH . "/Category.php" );
	require( CLASS_PATH . "/Gallery.php" );
	require( CLASS_PATH . "/cleanURLs.php" );
	require( CLASS_PATH . "/Breadcrumb.php" );
	require( CLASS_PATH . "/Banner.php" );
	 
	function handleException( $exception ) {
	  echo "Sorry, a problem occurred. Please try later.";
	  error_log( $exception->getMessage() );
	}
	 
	set_exception_handler( 'handleException' );
?>