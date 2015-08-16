<?php 
	header('Content-Type: text/html; charset=UTF-8');
	include "templates/admin/include/header.php"
 ?>
 
 	  <div id="container" class="col-sm-9 col-sm-offset-3">
 	  
 	  
 	  <div class="row">
 	  	
  		<h2 class="col-sm-7 col-sm-offset-2"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span><?php echo ' '.$results['pageTitle']?></h2>
  		<div class="text-right col-sm-3">
  			<?php if ( $results['category']->id ) { ?>
  				<a class="btn btn-danger btn-sm top-margin" href="admin.php?action=deleteCategory&amp;categoryId=<?php echo $results['category']->id ?>" onclick="return confirm('Delete This Category?')"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Delete This Category</a>
			<?php } ?>
  		</div>
 	  </div>
 	  
      <form action="admin.php?action=<?php echo $results['formAction']?>" method="post" class="form-horizontal" onsubmit="closeKeepAlive()">
        <input type="hidden" name="categoryId" value="<?php echo $results['category']->id ?>"/>
 
<?php if ( isset( $results['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>
 
        
 
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Category Name</label>
            <div class="col-sm-10">
            	<input class="form-control" type="text" name="name" id="name" placeholder="Name of the category" required autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['category']->name )?>" />
          	</div>
          </div>
 
          <div class="form-group">
            <label for="description" class="col-sm-2 control-label">Description</label>
            <div class="col-sm-10">
            	<textarea class="form-control" name="description" id="description" placeholder="Brief description of the category" required maxlength="1000" style="height: 5em;"><?php echo htmlspecialchars( $results['category']->description )?></textarea>
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