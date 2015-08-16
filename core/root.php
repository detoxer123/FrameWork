<?php
  // Get action
  $languages = array('hu','en');
  
   if ( isset($_GET['action']) && $_GET['action'] == 'archive' && in_array($_GET['categoryName'], $languages) ){
		$action = "";
		$_GET['lang'] = $_GET['categoryName'];
		$_GET['action'] = "";
		unset ( $_GET['categoryName'] );
	}
 
   $action = isset( $_GET['action'] ) ? $_GET['action'] : "";
	
  // Get language 
	if ( isset($_GET['lang']) ){
 		$lang = $_GET['lang'];	
 	} else{
 		$lang = 'hu';
	}
	
		
	
	if ( in_array($lang, $languages) ){
		$_SESSION['lang'] = $lang;
		require('languages/lang-'. $lang .'.php');
	}else {
		$_SESSION['lang'] = 'hu';
		require('languages/lang-hu.php');
	}
 
 
?>