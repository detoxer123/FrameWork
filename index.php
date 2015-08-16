<?php
	session_start();
	require( "core/root.php" );
	require( "core/config.php" );
 	
 
	switch ( $action ) {
	  case 'archive':
	    archive();
	    break;
	  case 'viewArticle':
	    viewArticle();
	    break;
	  case 'viewGallery';
	  	viewGallery();
	  break;
	  case 'galleries';
	  	galleries();
	  break;
	  default:
	    homepage();
	}
	 
	
	
	 
	function archive() {
		$results = array();
		$categoryName = ( isset( $_GET['categoryName'] ) && $_GET['categoryName'] ) ? $_GET['categoryName'] : null;
 		$page = ( isset( $_GET['page'] ) && $_GET['page'] ) ? $_GET['page'] : 1;
 		$results['category'] = Category::getByName( $categoryName );
		if ($categoryName != 'archive'){
			if (!$results['category'] || $results['category'] == null){
				header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
	  	  		require_once("templates/404error.php");
		  		exit;
			}
		}
  		$data = Article::getList( 100000, $results['category'] ? $results['category']->id : null );
		$results['articles'] = $data['results'];
		$results['totalRows'] = $data['totalRows'];
		$data = Category::getList();
  		$results['categories'] = array();
  		foreach ( $data['results'] as $category ) $results['categories'][$category->id] = $category;
  		$results['pageHeading'] = $results['category'] ?  $results['category']->name : "Article Archive";
  		$results['pageTitle'] = $results['pageHeading'] . " | ". SITE_NAME;
		$results['page'] = $page;
		$results['path'] = ( $results['category'] == null ) ? 'archive' : $results['category']->name; 
		$results = Article::pagination($results);
		$breadcr = new breadcrumb;
	    $breadcr->breadcrumb();
		require( TEMPLATE_PATH . "/archive.php" );
	}
	
	
	
	
	
	 
	function viewArticle() {
	  if ( !isset($_GET["articleId"]) || !$_GET["articleId"] ) {
	    homepage();
	    return;
	  }
	  
	  $results = array();
	  $results['article'] = Article::getById( (int)$_GET["articleId"] );
	  if ( $results['article'] ) {  
		  $results['category'] = Category::getById( $results['article']->categoryId );
		  $results['pageTitle'] = $results['article']->title . " | ". SITE_NAME;
		  $breadcr = new breadcrumb;
		  $breadcr->breadcrumb();
		  require( TEMPLATE_PATH . "/viewArticle.php" );
	  } else {
	  	  header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
	  	  require_once("templates/404error.php");
		  exit;
	  }
	}
	 
	 
	 
	 
	 
	 
	function homepage() {
	  $results = array();
	  $data = Article::getList( HOMEPAGE_NUM_ARTICLES );
	  $results['articles'] = $data['results'];
	  $results['totalRows'] = $data['totalRows'];
	  $data = Category::getList();
	  $results['categories'] = array();
	  foreach ( $data['results'] as $category ) {
	  	$results['categories'][$category->id] = $category;  
	  }	 
	  $results['pageTitle'] = SITE_NAME;
	  $banners = Banner::getCurrent();
	  $results['banners'] = $banners['results'];
	  /*var_dump($results['banners']);
	  die();*/
	  $breadcr = new breadcrumb;
	  $breadcr->breadcrumb();
	  require( TEMPLATE_PATH . "/homepage.php" );
	}
	
	
	
	function viewGallery() {
	  if ( !isset($_GET["galleryId"]) || !$_GET["galleryId"] ) {
	    galleries();
	    return;
	  }
	  $page = ( isset( $_GET['page'] ) && $_GET['page'] ) ? $_GET['page'] : 1;
	  $results = array();
	  $data = Gallery::getByIdGallery( (int)$_GET["galleryId"] );	  
	  if (!$data) {
	  	  header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
	  	  require_once("templates/404error.php");
		  exit;
	  }	
	  $results['galleries'] = $data;
	  $results['pageTitle'] = $results['galleries']->title . " | ". SITE_NAME;	
	  $results['page'] = $page;
	  $results['path'] = 'galleries/'. cleanURL::toAscii($results['galleries']->title) . '-' . $results['galleries']->id;
	  if ($results['galleries']->image != null){	
	  	$results = Gallery::galleryPager($results);  
	  }	  
	  $breadcr = new breadcrumb;
	  $breadcr->breadcrumb();
	  require( TEMPLATE_PATH . "/viewGallery.php" );
	}
	
	
	
	function galleries(){
	  $results = array();
	  $data = Gallery::getListGallery( HOMEPAGE_NUM_ARTICLES );
	  $page = ( isset( $_GET['page'] ) && $_GET['page'] ) ? $_GET['page'] : 1;
	  $results['galleries'] = $data['results'];
	  $results['totalRows'] = $data['totalRows'];  
	  $results['pageTitle'] = "Galleries";
	  $results['page'] = $page;
	  $results['path'] = 'galleries';
	  $results = Gallery::pagination($results);
	  $breadcr = new breadcrumb;
	  $breadcr->breadcrumb();
	  require( TEMPLATE_PATH . "/galleries.php" );
	}
	
?>