<?php include "templates/include/header.php" ?>
 	  <div id="breadcrumb"><?php echo $breadcr->breadcrumbs; ?></div>
      <h1><?php echo htmlspecialchars( $results['galleries']->title )?></h1>
      <div>
     
	 	<?php 
	    	if ($results['galleries']->image || $results['galleries']->image != null ){
		    	foreach (array_combine($results['galleries']->image, $results['galleries']->thumbnail) as $key => $value) {
					echo '<div class="one_gallery">';
					echo '<div class="gallery_thumb">';	
					echo '<a class="enlarge" href="' . $key . '">';
					echo '<img data-original="'. $value .'" alt="'. $results['galleries']->title .'" class="lazy" width="100%">';
					
					echo '</a>';
					echo '</div>';
					echo '</div>';
				}
			} else {
				echo '<p>No images found in this gallery</p>';
			}
	    ?>   
     
      </div>
	  <?php if (isset($results['pagination'])){ echo $results['pagination'];} ?>
      <p class="pubDate">Published on <?php echo date('j F Y', $results['galleries']->publicationDate)?></p>

 		
      <p><a href="./<?php echo $_SESSION['lang'] ?>/galleries">Return to Galleries</a></p>
 
<?php include "templates/include/footer.php" ?>