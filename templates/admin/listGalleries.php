<?php
	header('Content-Type: text/html; charset=UTF-8');
	 include "templates/admin/include/header.php"
	 ?>
 		
 	  <div id="container" class="col-sm-9 col-sm-offset-3">
 	  	
      <h2>All Galleries <small> | <?php echo $results['totalRows']?> galler<?php echo ( $results['totalRows'] != 1 ) ? 'ies' : 'y' ?> in total.</small></h2>
 	  <a href="admin.php?action=newGallery" type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add a New Gallery</a>
<?php if ( isset( $results['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>
 
 
<?php if ( isset( $results['statusMessage'] ) ) { ?>
        <div class="statusMessage"><?php echo $results['statusMessage'] ?></div>
<?php } ?>
 	  
      <div class="row" id="gallery">
      	
	        
	 
	<?php foreach ( $results['galleries'] as $gallery ) { ?>
	 	<div class="col-sm-4">
	        <a class="thumbnail" href="admin.php?action=editGallery&amp;galleryId=<?php echo $gallery->id?>">
	          <?php echo '<img src="'. $gallery->albumThumbnail .'">'?>
	          <?php echo '<p class="text-info">' . date('j M Y', $gallery->publicationDate). '</p>'?>
	          <?php echo '<h4>'. $gallery->title . '</h4>' ?>
	          
	        </a>
	 	</div>
	<?php } ?>
			
 	 	
      </div>
       
 
<?php include "templates/admin/include/footer.php" ?>