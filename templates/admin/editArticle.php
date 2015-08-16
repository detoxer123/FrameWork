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
	      <h2 class="col-sm-7 col-sm-offset-2"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span><?php echo ' '.$results['pageTitle']?></h2>
	 	  <div class="text-right col-sm-3">
			  <?php if ( $results['article']->id ) { ?>
		  			<a class="btn btn-danger btn-sm top-margin" href="admin.php?action=deleteArticle&amp;articleId=<?php echo $results['article']->id ?>" onclick="return confirm('Delete This Article?')"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Remove This Article</a>
			  <?php } ?>
		  </div>
	  </div>
      
      <form action="admin.php?action=<?php echo $results['formAction']?>" method="post" enctype="multipart/form-data" onsubmit="closeKeepAlive()" class="form-horizontal">
        
        <input type="hidden" name="articleId" value="<?php echo $results['article']->id ?>"/>
 
<?php if ( isset( $results['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>
 
       	   <div class="form-group">
             <label for="title" class="col-sm-2 control-label">Article Title</label>
             <div class="col-sm-10">
           	 	<input type="text" name="title" id="title" class="form-control" placeholder="Name of the article" required autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['article']->title )?>" />
           	 </div>
           </div>
 
           	
           <div class="form-group">
            <label for="summary" class="col-sm-2 control-label">Article Summary</label>
            <div class="col-sm-10">
            	<textarea name="summary" id="summary" class="form-control" placeholder="Brief description of the article" required maxlength="1000" style="min-height: 8em;"><?php echo htmlspecialchars( $results['article']->summary )?></textarea>
        	</div>
           </div>
 
      		<div class="form-group">
           		<label for="content" class="col-sm-2 control-label">Article Content</label>
           		<div class="col-sm-10">
            		<textarea name="content" id="content" class="form-control" placeholder="The HTML content of the article" required maxlength="100000" style="min-height: 30em;"><?php echo htmlspecialchars( $results['article']->content )?></textarea>
      			</div>
           </div>
      		
      		
      		<div class="form-group">
            	<label for="categoryId" class="col-sm-2 control-label">Article Category</label>
            	<div class="col-sm-10">
           		<select name="categoryId" class="form-control">
          		    <option value="0"<?php echo !$results['article']->categoryId ? " selected" : ""?>>(none)</option>
         		   <?php foreach ( $results['categories'] as $category ) { ?>
          		    <option value="<?php echo $category->id?>"<?php echo ( $category->id == $results['article']->categoryId ) ? " selected" : ""?>><?php echo htmlspecialchars( $category->name )?></option>
        		    <?php } ?>
         	 	</select>
         		</div>
           </div>
         	
         	<div class="form-group">
           		<label for="publicationDate" class="col-sm-2 control-label">Publication Date</label>
           		<div class="col-sm-10">
           			<input type="date" name="publicationDate" id="publicationDate" class="form-control" placeholder="YYYY-MM-DD" required maxlength="10" value="<?php echo $results['article']->publicationDate ? date( "Y-m-d", $results['article']->publicationDate ) : "" ?>" />
          		</div>
           </div>
 
			<?php if ( $results['article'] && $imagePath = $results['article']->getImagePath() ) { ?>
          	
          	<div class="form-group">
            	<label class="col-sm-2 control-label">Current Image</label>
            	<div class="col-sm-10">
            		<img id="articleImage" class="col-sm-8 thumbnail" src="<?php echo $imagePath ?>" alt="Article Image" />
            		<input type="checkbox" name="deleteImage" id="deleteImage" value="yes"/ > <label for="deleteImage">Delete this image</label>
            	</div>
         	</div>
          <?php } ?>
 
          	<div class="form-group">
          	 	<label for="image" class="col-sm-2 control-label">New Image</label>
          	 	<div class="col-sm-10">
           			<input type="file" class="form-control" name="image" id="image" placeholder="Choose an image to upload" maxlength="255" />
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