<?php 
	header('Content-Type: text/html; charset=UTF-8');
	include "templates/admin/include/header.php"
	?>
 	
 	<div id="container" class="col-sm-9 col-sm-offset-3">
 	
	<script>
 
      // Prevents file upload hangs in Mac Safari
      // Inspired by http://airbladesoftware.com/notes/note-to-self-prevent-uploads-hanging-in-safari
 
      function closeKeepAlive() {
        if ( /AppleWebKit|MSIE/.test( navigator.userAgent) ) {
          var xhr = new XMLHttpRequest();
          xhr.open( "GET", "/ping/close", false );
          xhr.send();
        }
      }
 
     </script>
     
      <div class="row">
      	<h2 class="col-sm-7 col-sm-offset-2"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span><?php echo ' '. $results['pageTitle']?></h2>
 	  	<div class="text-right col-sm-3">
 	  		<?php if ( $results['gallery']->id ) { ?>
     			<a class="btn btn-danger btn-sm top-margin" href="admin.php?action=deleteGallery&amp;galleryId=<?php echo $results['gallery']->id ?>" onclick="return confirm('Delete This Gallery?')"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Delete This Gallery</a>
			<?php } ?>
 	  	</div>
 	  </div>
      <form action="admin.php?action=<?php echo $results['formAction']?>" method="post" enctype="multipart/form-data" onsubmit="closeKeepAlive()" class="form-horizontal">
        <input type="hidden" name="galleryId" value="<?php echo $results['gallery']->id ?>"/>
 
<?php if ( isset( $results['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>
 
 
 		  <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Gallery Title</label>
            <div class="col-sm-10">
            	<input type="text" name="title" id="title" class="form-control" placeholder="Name of the article" required autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['gallery']->title )?>" />
          	</div>
          </div>
 			
 			
 			<div class="form-group">
 				<label for="images" class="col-sm-2 control-label">Images</label>
 				<div class="col-sm-10">		 				
				          	<?php 
					    		if ($results['gallery']->image && $results['gallery']->thumbnail){
						    		echo '<div class="row">';
						    		
						    		foreach (array_combine($results['gallery']->image, $results['gallery']->thumbnail) as $key => $value) {
						    			echo '<div class="col-sm-4 col-md-4">';
										echo '<a class="enlarge thumbnail" href="' . $key . '">';
										echo '<img class="lazy" data-original="'. $value .'"  />';
										echo '</a>';
						    			echo '<div class="caption">';
						    			echo '<input type="checkbox" name="deleteImage[]" value='. $key .' /> <label for="deleteImage">Delete</label>';
										echo '</div>';
										echo '</div>';
									}
									
					          		echo '</div>';
									
								}else echo '<div class="col-sm-4"> There is no image in this gallery </div>';
					    	?>
		          		
		           
		          	
		        </div>
          	</div>
          <div class="form-group">
            <label for="publicationDate" class="col-sm-2 control-label">Publication Date</label>
            <div class="col-sm-10">
            	<input type="date" name="publicationDate" id="publicationDate" class="form-control" placeholder="YYYY-MM-DD" required maxlength="10" value="<?php echo $results['gallery']->publicationDate ? date( "Y-m-d", $results['gallery']->publicationDate ) : "" ?>" />
          	</div>
          </div>
 
          
          <div class="form-group">
            <label for="image" class="col-sm-2 control-label">Add Image(s)</label>
            <div class="col-sm-10">
            	<input type="file" name="images[]" id="image" multiple="" class="form-control" placeholder="Choose an image to upload" maxlength="255" />
          	</div>
          </div>
          
 		
 		<div class="row">
	        <div class="col-sm-12 text-center" >
	          <div class="btn-group" role="group">
	            <input class="btn btn-primary btn-lg" type="submit" name="saveChanges" value="Save Changes" />
	          	<input class="btn btn-primary btn-lg" type="submit" formnovalidate name="cancel" value="Cancel" />
			  </div>
			</div>
 	  	</div>
 		
      </form>
 
 
<?php include "templates/admin/include/footer.php" ?>