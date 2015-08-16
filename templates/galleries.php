<?php include "templates/include/header.php" ?>
	  <h2><?php echo LANG_GALLERIES; ?></h2>
 	  <div id="breadcrumb"><?php echo $breadcr->breadcrumbs; ?></div>
      <ul id="galleries">
 
<?php foreach ( $results['galleries'] as $gallery ) { ?>
 		<?php $results['ulrTitle'] = cleanURL::toAscii($gallery->title); ?>
        <li class="one_gallery">
          <div class="gallery_thumb">
	          <a  href="<?php echo $_SESSION['lang'].'/galleries/'.$results['ulrTitle']?>-<?php echo $gallery->id?>">
	          	  <?php echo '<img class="lazy" data-original="'. $gallery->albumThumbnail .'" alt="'.htmlspecialchars( $gallery->title ).'" />'; ?>
		      </a>
	      </div>
	      <div class="gallery_titles">
	            <span class="pubDate"><?php echo date('j F', $gallery->publicationDate)?></span>
	          <h2>  
	            <a  href="galleries/<?php echo $results['ulrTitle']?>-<?php echo $gallery->id?>"><?php echo htmlspecialchars( $gallery->title )?></a>
	          </h2>
 		  </div>         
        </li>
<?php } ?>
 		<div class="clear"></div>
      </ul>
 	<?php echo $results['pagination'] ?>
 
<?php include "templates/include/footer.php" ?>