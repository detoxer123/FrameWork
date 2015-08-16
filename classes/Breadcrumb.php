<?php

class breadcrumb {
	
	public $breadcrumbs;
	
	private $url;
	
	private $parts;
	
	private $pointer = '->';
	
	public function __construct() {
		
		$this->setURL();
		$this->setParts();
		$this->breadcrumbs = '<a href="'.$this->url.'">Home</a>';
		
	}
		
	public function setURL() {
		$protocol = $_SERVER["SERVER_PROTOCOL"]=='HTTP/1.1' ? 'http' : 'https';
        $this->url = $protocol.'://'.$_SERVER['HTTP_HOST'];
	}

	public function setParts() {
		$parts = explode('/', $_SERVER['REQUEST_URI']); 
        array_shift($parts);
		//array_shift($parts); //for online mode
    	$this->parts = $parts;
	}

	public function breadcrumb() {
			
		$num = null;
		
		if (isset($_GET['action'])) $action = $_GET['action'];
		if (isset($_GET['articleId'])) $articleId = $_GET['articleId'];
		if (isset($_GET['galleryId'])) $galleryId = $_GET['galleryId'];
		if (isset($_GET['categoryName'])) $categoryName = $_GET['categoryName'];
		
		
		if ( isset( $action ) ){
			switch ( $action ) {
						 	
				 case 'viewArticle':
					 	$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
					    $sql = "SELECT title FROM articles WHERE id = :id";
					    $st = $conn->prepare( $sql );
					    $st->bindValue( ":id", $articleId, PDO::PARAM_INT );
					    $st->execute();
						$brname = $st->fetch();
						$part = $brname[0];
						$titleUrl = ($this->parts[2]);
						array_pop($this->parts);
						array_push($this->parts, $part);
				 		
						
						for ($i = 0; $i <=1; $i++){
								
							$this->url .= "/". $this->parts[$i];
							
							
							$this->breadcrumbs .=  $this->pointer .'<a href="'.$this->url.'">'.ucfirst($this->parts[$i]).'</a>';
							
						}
						
						$this->url .= "/". $titleUrl;
						$this->breadcrumbs .=  $this->pointer .'<a href="'.$this->url.'">'.ucfirst($this->parts[2]).'</a>';
						
				 break;
					 
				 case 'viewGallery':
					    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
					    $sql = "SELECT title FROM galleries WHERE id = :id";
					    $st = $conn->prepare( $sql );
					    $st->bindValue( ":id", $galleryId, PDO::PARAM_INT );
					    $st->execute();
						$brname = $st->fetch();
						$part = $brname[0];
						$titleUrl = ($this->parts[2]);
						array_pop($this->parts);
						array_push($this->parts, $part);		
												
						for ($i = 0; $i <=1; $i++){
								
							$this->url .= "/". $this->parts[$i];
							
							
							$this->breadcrumbs .=  $this->pointer .'<a href="'.$this->url.'">'.ucfirst($this->parts[$i]).'</a>';
							
						}
						
						$this->url .= "/". $titleUrl;
						$this->breadcrumbs .=  $this->pointer .'<a href="'.$this->url.'">'.ucfirst(array_pop($this->parts)).'</a>';
						
						
				 break;
				 
				 
				 default:
				 	
				 	foreach($this->parts as $part){
									
								$this->url .= "/". $part;
									//if the part is an article category do not make breadcrumb
							 
						        
								if (!is_numeric( $part )){
									
										$this->breadcrumbs .=  $this->pointer .'<a href="'.$this->url.'">'.ucfirst($part).'</a>';
									
								}   
        				}
				 break;
			 }
		 }
		
	}

}

?>