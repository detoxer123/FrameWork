<?php
 
class Gallery
{
 
 
  public $id = null;
  public $publicationDate = null;
  public $title = null;
  public $albumThumbnail = null;
  public $thumbnail = null;
  public $image = null;
 
 
 
 
  public function __construct( $data=array() ) {
    if ( isset( $data['id'] ) ) $this->id = (int) $data['id'];
    if ( isset( $data['publicationDate'] ) ) $this->publicationDate = (int) $data['publicationDate'];
    if ( isset( $data['title'] ) ) $this->title = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['title'] );
  	if ( isset( $data['albumThumbnail'] ) ) $this->albumThumbnail = $data['albumThumbnail'];
	if ( isset( $data[0]) && is_array( $data[0] ) ){
		 foreach ($data[0] as $key => $value){
		 	if (isset( $value['image']) && $value['image'] != null){
				$this->image[] = $value['image'];
			};
		 }
	
	foreach ($data[0] as $key => $value){
				if (isset( $value['thumbnail']) && $value['thumbnail'] != null ){
					$this->thumbnail[] = $value['thumbnail'];
				};
				
		}
	};
  }
 
  public function getGalleryPath( $type=IMG_TYPE_FULLSIZE ) {
    return ( $this->id ) ? ( GALLERY_PATH . "/" . $this->id ) : false;
  }
 
 
  public function storeFormValuesGallery ( $params ) {
 
    // Store all the parameters
    $this->__construct( $params );
 
    // Parse and store the publication date
    if ( isset($params['publicationDate']) ) {
      $publicationDate = explode ( '-', $params['publicationDate'] );
 
      if ( count($publicationDate) == 3 ) {
        list ( $y, $m, $d ) = $publicationDate;
        $this->publicationDate = mktime ( 0, 0, 0, $m, $d, $y );
      }
    }
  }
 
 
 	public static function getByIdGallery( $id ) {
	    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	    $sql = "SELECT * FROM pictures WHERE albumId = :id";
	    $st = $conn->prepare( $sql );
	    $st->bindValue( ":id", $id, PDO::PARAM_INT );
	    $st->execute();
	    $fpart[] = $st->fetchAll();
		$sql = "SELECT *, UNIX_TIMESTAMP(publicationDate) AS publicationDate FROM galleries WHERE id = :id";
		$st = $conn->prepare( $sql );
	    $st->bindValue( ":id", $id, PDO::PARAM_INT );
	    $st->execute();
		$spart = $st->fetch();
		if (!$spart[0]){
			return;
		}
		$row = array_merge($fpart, $spart);
		$conn = null;
	    if ( $row ) return new Gallery( $row );
 	 }
   
   
  public static function getListGallery( $numRows=1000000, $order="publicationDate DESC" ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT SQL_CALC_FOUND_ROWS *, UNIX_TIMESTAMP(publicationDate) AS publicationDate FROM galleries
            ORDER BY " . $order . " LIMIT :numRows";
 
    $st = $conn->prepare( $sql );
    $st->bindValue( ":numRows", $numRows, PDO::PARAM_INT );
    $st->execute();
    $list = array();
 
    while ( $row = $st->fetch() ) {
      $gallery = new Gallery( $row );
      $list[] = $gallery;
    }
 
  
    $sql = "SELECT FOUND_ROWS() AS totalRows";
    $totalRows = $conn->query( $sql )->fetch();
    $conn = null;
    return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
  }
 
 
  
 
  public function insertGallery() {
 
   
    if ( !is_null( $this->id ) ) trigger_error ( "Gallery::insert(): Attempt to insert an Gallery object that already has its ID property set (to $this->id).", E_USER_ERROR );
 
    
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "INSERT INTO galleries ( publicationDate, title ) VALUES ( FROM_UNIXTIME(:publicationDate), :title )";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":publicationDate", $this->publicationDate, PDO::PARAM_INT );
    $st->bindValue( ":title", $this->title, PDO::PARAM_STR );
	//$st->bindValue( ":albumThumbnail", $this->albumThumbnail, PDO::PARAM_STR );
    $st->execute();
    $this->id = $conn->lastInsertId();
	    $sql = "INSERT INTO pictures (albumId, image, thumbnail) VALUES (:albumId, :image, :thumb )";
	    $st = $conn->prepare( $sql );
		$st->bindValue( ":albumId", $this->id, PDO::PARAM_INT );
		$st->bindValue( ":image", $this->image, PDO::PARAM_STR );
		$st->bindValue( ":thumb", $this->thumbnail, PDO::PARAM_STR );
		$st->execute();
	    $conn = null;
   
  }
 
 
 
 
  public function updateGallery() {
 
  
    if ( is_null( $this->id ) ) trigger_error ( "Gallery::update(): Attempt to update an Gallery object that does not have its ID property set.", E_USER_ERROR );
    
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "UPDATE galleries SET publicationDate=FROM_UNIXTIME(:publicationDate), title=:title, albumThumbnail=:albumThumbnail WHERE id = :id";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":publicationDate", $this->publicationDate, PDO::PARAM_INT );
    $st->bindValue( ":title", $this->title, PDO::PARAM_STR );
    $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
	$st->bindValue( ":albumThumbnail", $this->albumThumbnail, PDO::PARAM_STR );
    $st->execute();
    $sql = null;
    for ($i=0; $i <count($this->image); $i++){
	    $sql = "INSERT INTO pictures (albumId, image, thumbnail) VALUES (:albumId, :image, :thumb )";
	    $st = $conn->prepare( $sql );
		$st->bindValue( ":albumId", $this->id, PDO::PARAM_INT );
		$st->bindValue( ":image", $this->image[$i], PDO::PARAM_STR );
		$st->bindValue( ":thumb", $this->thumbnail[$i], PDO::PARAM_STR );
		$st->execute();
	    
    }
	$conn = null;
  }
  
 
  public function storeUploadedImageGallery( $image ) {
 	$this->image = array();
 	$this->thumbnail = array();
 	
 	for ($i=0; $i <count($image['name']); $i++){
 		echo $i;

	    if ( $image['error'][$i] == UPLOAD_ERR_OK )
	    {
	      // Does the Gallery object have an ID?
	      if ( is_null( $this->id ) ) trigger_error( "Gallery::storeUploadedImage(): Attempt to upload an image for an Gallery object that does not have its ID property set.", E_USER_ERROR );
	 	  	 
	      $tempFilename = trim( $image['tmp_name'][$i] );
		  
	 	  $dir = $this->id;
		  $up_dir = GALLERY_PATH .'/'. $dir;
		  $up_dir_tmp = GALLERY_PATH .'/'. $dir.'/thumbs';
		  if ( !is_dir($up_dir)){
		  	mkdir($up_dir);
		  }
	 	  if ( !is_dir($up_dir_tmp)){
		  	mkdir($up_dir_tmp);
		  }
	 	  
	 	  
	 	  $up_file = GALLERY_PATH .'/'. $dir .'/'. $image['name'][$i];
	 	  $thumb_file = GALLERY_PATH .'/'. $dir .'/thumbs/'. $image['name'][$i];
	 	  
	      if ( is_uploaded_file ( $tempFilename ) ) {
	       if( !(move_uploaded_file($tempFilename, $up_file)) ) trigger_error( "Gallery::storeUploadedImage(): Couldn't move uploaded file.", E_USER_ERROR );
	       if ( !( chmod( $up_file, 0666 ) ) ) trigger_error( "Gallery::storeUploadedImage(): Couldn't set permissions on uploaded file.", E_USER_ERROR );
	      }
	 		
		  	  
		  // Get the image size
	      $attrs = getimagesize ( $up_file );
	      $imageWidth = $attrs[0];
	      $imageHeight = $attrs[1];
	      $imageType = $attrs[2];
		  	  
			  
		  switch ( $imageType ) {
	        case IMAGETYPE_GIF:
	          $imageResource = imagecreatefromgif ( $up_file );
	          break;
	        case IMAGETYPE_JPEG:
	          $imageResource = imagecreatefromjpeg ( $up_file );
	          break;
	        case IMAGETYPE_PNG:
	          $imageResource = imagecreatefrompng ( $up_file );
	          break;
	        default:
	          trigger_error ( "Gallery::storeUploadedImage(): Unhandled or unknown image type ($imageType)", E_USER_ERROR );
	      }
		  
		  
		  
	      //Create thumbnail
		  $thumbHeight = intval ( $imageHeight / $imageWidth * GALLERY_THUMB_WIDTH );
	      $thumbResource = imagecreatetruecolor ( GALLERY_THUMB_WIDTH, $thumbHeight );
	      imagecopyresampled( $thumbResource, $imageResource, 0, 0, 0, 0, GALLERY_THUMB_WIDTH, $thumbHeight, $imageWidth, $imageHeight );
	 
	      // Save the thumbnail
	      switch ( $imageType ) {
	        case IMAGETYPE_GIF:
	          imagegif ( $thumbResource, $thumb_file );
	          break;
	        case IMAGETYPE_JPEG:
	          imagejpeg ( $thumbResource, $thumb_file );
	          break;
	        case IMAGETYPE_PNG:
	          imagepng ( $thumbResource, $thumb_file );
	          break;
	        default:
	          trigger_error ( "Gallery::storeUploadedImage(): Unhandled or unknown image type ($imageType)", E_USER_ERROR );
	      }
		  	  
	      
	      
	     /* var_dump($tempFilename);
	      
	      echo $image['name'][$i];
	      var_dump($this);*/
	 	  
		  //store data in object
		  echo '**********'.$up_file;
		  echo $thumb_file;
		  array_push($this->image, $up_file);
		  array_push($this->thumbnail, $thumb_file);
		/*  var_dump($this);*/
		 
	    
	    }
	}
  }
 
  public function getAlbumThumbnail(){
  	$id= $this->id;
    $thumb_dir = GALLERY_PATH .'/'. $id .'/thumbs';
  	if (is_dir($thumb_dir)){
  	$dir = opendir($thumb_dir);
			while (false !== ($entry = readdir($dir))) {
	    	if($entry != '.' && $entry != '..') { 
	       	 $this->albumThumbnail = $thumb_dir .'/'.$entry;
	       	 break;
	   	 	}
		}
	}else{
		$this->albumThumbnail = NO_THUMBNAIL;
	}
  }
  
  public function deleteImagesGallery($images) {
 	var_dump($images);
	$id = $this->id;
	foreach ($images as $image){
		echo $image;
		echo $id;		
	}
	
	if ( is_null( $this->id ) ) trigger_error ( "Gallery::delete(): Attempt to delete an Gallery object that does not have its ID property set.", E_USER_ERROR );
 
    
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	
	foreach ($images as $image){
		$pathParts = explode('/', $image);
		$imageName = end($pathParts);
		$thumb = GALLERY_PATH .'/'. $id .'/thumbs/'. $imageName;
	    $st = $conn->prepare ( "DELETE FROM pictures WHERE albumId = :id AND image = :image " );
	    $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
		$st->bindValue( ":image", $image, PDO::PARAM_STR );	
	    $st->execute();
		if ( !unlink( $image ) ) trigger_error( "Gallery::deleteImagesGallery(): Couldn't delete image file.", E_USER_ERROR );
		if ( !unlink( $thumb ) ) trigger_error( "Gallery::deleteImagesGallery(): Couldn't delete thumbnail file.", E_USER_ERROR );
	}
    
    $conn = null;
	
	
 	
  /*  // Delete all fullsize images for this gallery
    foreach (glob( ARTICLE_IMAGE_PATH . "/" . IMG_TYPE_FULLSIZE . "/" . $this->id . ".*") as $filename) {
      if ( !unlink( $filename ) ) trigger_error( "Article::deleteImages(): Couldn't delete image file.", E_USER_ERROR );
    }
     
    // Delete all thumbnail images for this gallery
    foreach (glob( ARTICLE_IMAGE_PATH . "/" . IMG_TYPE_THUMB . "/" . $this->id . ".*") as $filename) {
      if ( !unlink( $filename ) ) trigger_error( "Article::deleteImages(): Couldn't delete thumbnail file.", E_USER_ERROR );
    }
 
    // Remove the image filename extension from the object
    $this->imageExtension = "";*/
  }
 
  public function deleteGallery() {
 
    // delete gallery from database
    if ( is_null( $this->id ) ) trigger_error ( "Gallery::delete(): Attempt to delete an Gallery object that does not have its ID property set.", E_USER_ERROR );
 
    
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $st = $conn->prepare ( "DELETE FROM galleries WHERE id = :id LIMIT 1" );
    $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
    $st->execute();
    $st = $conn->prepare( "DELETE FROM pictures WHERE albumId = :id" );
    $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
	
  }
 
  public static function deleteDirectory($dir){
 		//delete gallery directories
 		if (is_dir($dir)) {
    		 $objects = scandir($dir);
     		 foreach ($objects as $object) {
       			if ($object != "." && $object != "..") {
       			  if (filetype($dir."/".$object) == "dir") rmdir($dir."/".$object); else unlink($dir."/".$object);
      		 	}
    		 }
     reset($objects);
     rmdir($dir);
   }
 	
  }
 
  public static function pagination($results){
 	
	$page = intval(abs($results['page'])); //current page 
	$totalRows = $results['totalRows']; //total contents
	$path = $results['path']; //category path
	
	$resultPerPage = ITEM_PER_GALLERY; 
	if ($totalRows<$resultPerPage) $resultPerPage = $totalRows;
	
	
	$totalPages = ceil($totalRows/$resultPerPage);
	
	if ( $page > $totalPages )  {
			$page = 1;
	}
	
	$startResult = ($page - 1 ) * $resultPerPage;
	
	 	
 	for ( $i = $startResult; $i < ($startResult+$resultPerPage); $i++ ){
 		if (isset($results['galleries'][$i])) $recent_content[] = $results['galleries'][$i];
 	}
	
	unset ($results['galleries']);
	$results['galleries'] = $recent_content;
	
	$results['pagination'] = null;
	
	if ($totalPages > 1) {
		$results['pagination'] = '<div class="pager"><a href="' .$path. '/1">First</a>&nbsp';
		
		for ($i = 1; $i <= $totalPages; $i++){
			
			if($i == $page) 
				$results['pagination'] .=  '<a class="active">'.$i.'</a>&nbsp';
			else
				$results['pagination'] .= '<a href="' .$path. '/'.$i .'">'. $i .'</a>&nbsp';
			
		}
		
		$results['pagination'] .= '<a href="' . $path . '/'. $totalPages .'">Last</a></div>';
	}
	
	return $results;
 }
 
 
 public static function galleryPager($results){
 	
	$page = intval(abs($results['page'])); //current page 
	$totalRows = count($results['galleries']->thumbnail); //total contents
	$path = $results['path']; //category path
	$lang = $_SESSION['lang'];
	
	$resultPerPage = ITEM_PER_GALLERY; 
	if ($totalRows<$resultPerPage) $resultPerPage = $totalRows;
	
	
	$totalPages = ceil($totalRows/$resultPerPage);
	
	if ( $page > $totalPages )  {
			$page = 1;
	}
	
	$startResult = ($page - 1 ) * $resultPerPage;
	
	 	
 	for ( $i = $startResult; $i < ($startResult+$resultPerPage); $i++ ){
 		if (isset($results['galleries']->thumbnail[$i])) $recent_thumbs[] = $results['galleries']->thumbnail[$i];
 		if (isset($results['galleries']->image[$i])) $recent_images[] = $results['galleries']->image[$i];
 		
 	}
	
	unset ($results['galleries']->thumbnail);
	unset ($results['galleries']->image);
	$results['galleries']->thumbnail = $recent_thumbs;
	$results['galleries']->image = $recent_images;
	
	$results['pagination'] = null;
	
	if ($totalPages > 1) {
		$results['pagination'] = '<div class="pager"><a href="'.$lang.'/'.$path. '/1">First</a>&nbsp';
		
		for ($i = 1; $i <= $totalPages; $i++){
			
			if($i == $page) 
				$results['pagination'] .=  '<a class="active">'.$i.'</a>&nbsp';
			else
				$results['pagination'] .= '<a href="'.$lang.'/'.$path. '/'.$i .'">'. $i .'</a>&nbsp';
			
		}
		
		$results['pagination'] .= '<a href="'.$lang.'/'. $path . '/'. $totalPages .'">Last</a></div>';
	}
	
	
	return $results;
  }
 
}
 
?>