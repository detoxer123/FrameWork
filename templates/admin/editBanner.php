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
			  <?php if ( $results['banner']->id ) { ?>
		  			<a class="btn btn-danger btn-sm top-margin" href="admin.php?action=deleteBanner&amp;bannerId=<?php echo $results['banner']->id ?>" onclick="return confirm('Delete This Banner?')"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Remove This Banner</a>
			  <?php } ?>
		  </div>
	  </div>
      
      <form action="admin.php?action=<?php echo $results['formAction']?>" method="post" enctype="multipart/form-data" onsubmit="closeKeepAlive()" class="form-horizontal">
        
        <input type="hidden" name="bannerId" value="<?php echo $results['banner']->id ?>"/>
 
<?php if ( isset( $results['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>
       	   <div class="form-group">
             <label for="text_hu" class="col-sm-2 control-label">Banner text - hungarian</label>
             <div class="col-sm-10">
           	 	<input type="text_hu" name="text_hu" id="text_hu" class="form-control" placeholder="Text of the banner" required autofocus maxlength="255" value="<?php echo  $results['banner']->text_hu?>" />
           	 </div>
           </div>
           
           <div class="form-group">
             <label for="text_en" class="col-sm-2 control-label">Banner text - english</label>
             <div class="col-sm-10">
           	 	<input type="text_en" name="text_en" id="text_en" class="form-control" placeholder="Text of the banner" required autofocus maxlength="255" value="<?php echo  $results['banner']->text_en?>" />
           	 </div>
           </div>      		
         	
           <div class="form-group">
           		<label for="publicationDate" class="col-sm-2 control-label">Publication Date</label>
           		<div class="col-sm-10">
           			<input type="date" name="publicationDate" id="publicationDate" class="form-control" placeholder="YYYY-MM-DD" required maxlength="10" value="<?php echo $results['banner']->Sdate ? date( "Y-m-d", $results['banner']->Sdate ) : "" ?>" />
          		</div>
           </div>
           
           <div class="form-group">
           		<label for="revocationDate" class="col-sm-2 control-label">Revocation Date</label>
           		<div class="col-sm-10">
           			<input type="date" name="revocationDate" id="revocationDate" class="form-control" placeholder="YYYY-MM-DD" required maxlength="10" value="<?php echo $results['banner']->Edate ? date( "Y-m-d", $results['banner']->Edate ) : "" ?>" />
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