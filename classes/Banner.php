<?php
 

class Banner
{
  
 
  public $id = null;
 
 
  public $Sdate = null;
 
  
  public $Edate = null;
 
  
  public $text_hu = null;
  
  public $text_en = null;
 
  
 
   
 
  public function __construct( $data=array() ) {
    if ( isset( $data['id'] ) ) $this->id = (int) $data['id'];
    if ( isset( $data['start'] ) ) $this->Sdate = $data['start'];
    if ( isset( $data['end'] ) ) $this->Edate = $data['end'];
    if ( isset( $data['text_hu'] ) ) $this->text_hu = $data['text_hu'];
	if ( isset( $data['text_en'] ) ) $this->text_en = $data['text_en'];
 }
 
 
  
 
  public function storeFormValues ( $params ) {
    	
    // Store all the parameters
    $this->__construct( $params );
 	
 
 
    // Parse and store the publication date
    if ( isset($params['publicationDate']) ) {
      $sdate = explode ( '-', $params['publicationDate'] );
 
      if ( count($sdate) == 3 ) {
        list ( $y, $m, $d ) = $sdate;
        $this->Sdate = mktime ( 0, 0, 0, $m, $d, $y );
      }
    }
	
	if ( isset($params['revocationDate']) ) {
      $edate = explode ( '-', $params['revocationDate'] );
 
      if ( count($edate) == 3 ) {
        list ( $y, $m, $d ) = $edate;
        $this->Edate = mktime ( 0, 0, 0, $m, $d, $y );
      }
    }

	
  }
  
 
   
  public static function getList( $numRows=10000, $order="start DESC" ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
    $sql = "SELECT SQL_CALC_FOUND_ROWS *, UNIX_TIMESTAMP(start) AS start, UNIX_TIMESTAMP(end) AS end FROM banner ORDER BY " . $order . " LIMIT :numRows";
 
    $st = $conn->prepare( $sql );
    $st->bindValue( ":numRows", $numRows, PDO::PARAM_INT );
    $st->execute();
    $list = array();
 
    while ( $row = $st->fetch() ) {
      $banner = new Banner( $row );
      $list[] = $banner;
    }
	
	
    // Get the total number of articles that matched the criteria
    $sql = "SELECT FOUND_ROWS() AS totalRows";
    $totalRows = $conn->query( $sql )->fetch();
    $conn = null;
    return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
  }
 
  public static function getCurrent( $numRows=1, $order="start DESC" ) {
  	$today = date("Y-m-d");
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
    $sql = "SELECT SQL_CALC_FOUND_ROWS *, UNIX_TIMESTAMP(start) AS start, UNIX_TIMESTAMP(end) AS end FROM banner WHERE end >= :today ORDER BY " . $order . " LIMIT :numRows";
 
    $st = $conn->prepare( $sql );
    $st->bindValue( ":numRows", $numRows, PDO::PARAM_INT );
	$st->bindValue( ":today", $today );
    $st->execute();
    $list = array();
 
    while ( $row = $st->fetch() ) {
      $banner = new Banner( $row );
      $list[] = $banner;
    }
	
	
    // Get the total number of articles that matched the criteria
    $sql = "SELECT FOUND_ROWS() AS totalRows";
    $totalRows = $conn->query( $sql )->fetch();
    $conn = null;
    return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
  }
 
  public static function getById( $id ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
    $sql = "SELECT *, UNIX_TIMESTAMP(start) AS start, UNIX_TIMESTAMP(end) AS end FROM banner WHERE id = :id";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":id", $id, PDO::PARAM_INT );
    $st->execute();
    $row = $st->fetch();
    $conn = null;
    if ( $row ) return new Banner( $row );
  }
 
   
  public function insert() {
 
    // Does the Concert object already have an ID?
    if ( !is_null( $this->id ) ) trigger_error ( "Banner::insert(): Attempt to insert an Banner object that already has its ID property set (to $this->id).", E_USER_ERROR );
 
    // Insert the Concert
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
    $sql = "INSERT INTO banner ( start, end, text_hu, text_en ) VALUES ( FROM_UNIXTIME(:start), FROM_UNIXTIME(:end), :text_hu, :text_en )";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":start", $this->Sdate, PDO::PARAM_INT );
    $st->bindValue( ":end", $this->Edate, PDO::PARAM_INT );
    $st->bindValue( ":text_hu", $this->text_hu, PDO::PARAM_STR );
    $st->bindValue( ":text_en", $this->text_en, PDO::PARAM_STR );
    $st->execute();
    $this->id = $conn->lastInsertId();
    $conn = null;
  }
 
 
  /**
  * Updates the current Concert object in the database.
  */
 
  public function update() {
    // Does the banner object have an ID?
    if ( is_null( $this->id ) ) trigger_error ( "Banner::update(): Attempt to update an Banner object that does not have its ID property set.", E_USER_ERROR );
    
    // Update the Concert
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
    $sql = "UPDATE banner SET start=FROM_UNIXTIME(:start), end=FROM_UNIXTIME(:end), text_hu=:text_hu, text_en=:text_en WHERE id = :id";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":start", $this->Sdate, PDO::PARAM_INT );
    $st->bindValue( ":end", $this->Edate, PDO::PARAM_INT );
    $st->bindValue( ":text_hu", $this->text_hu, PDO::PARAM_STR );
	$st->bindValue( ":text_en", $this->text_en, PDO::PARAM_STR );
	$st->bindValue( ":id", $this->id, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
  }
 
 
  /**
  * Deletes the current Concert object from the database.
  */
 
  public function delete() {
 
    // Does the Concert object have an ID?
    if ( is_null( $this->id ) ) trigger_error ( "Banner::delete(): Attempt to delete an Banner object that does not have its ID property set.", E_USER_ERROR );
    // Delete the Concert
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $st = $conn->prepare ( "DELETE FROM banner WHERE id = :id LIMIT 1" );
    $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
  }
 
 /**
  * Uses pager to list Article object from the database.
  */ 
 
/* public function pagination($results){
 	
	$page = intval(abs($results['page'])); //current page 
	$totalRows = $results['totalRows']; //total contents
	$path = $results['path']; //category path
	
	$resultPerPage = ITEM_PER_ARCHIVE; 
	if ($totalRows<$resultPerPage) $resultPerPage = $totalRows;
	
	
	$totalPages = ceil($totalRows/$resultPerPage);
	
	if ( $page > $totalPages )  {
			$page = 1;
	}
	
	$startResult = ($page - 1 ) * $resultPerPage;
	
	 	
 	for ( $i = $startResult; $i < ($startResult+$resultPerPage); $i++ ){
 		if (isset($results['articles'][$i])) $recent_content[] = $results['articles'][$i];
 	}
	
	unset ($results['articles']);
	$results['articles'] = $recent_content;
	
	$results['pagination'] = null;
	
	if ($totalPages > 1) {
		$results['pagination'] = '<div class="pager"><a href="' .$path. '/1#content">First</a>&nbsp';
		
		for ($i = 1; $i <= $totalPages; $i++){
			
			if($i == $page) 
				$results['pagination'] .=  '<a class="active">'.$i.'</a>&nbsp';
			else
				$results['pagination'] .= '<a href="' .$path. '/'.$i .'#content">'. $i .'</a>&nbsp';
			
		}
		
		$results['pagination'] .= '<a href="' . $path . '/'. $totalPages .'#content">Last</a></div>';
	}
	
	return $results;
 }*/
 
}
 
?>