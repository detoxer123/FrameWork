<?php include "templates/include/header.php";
	  header('Content-Type: text/html; charset=UTF-8');
?>
 	  <h2><?php echo LANG_HOMEPAGE ?></h2>
 	  <?php foreach ( $results['banners'] as $banner ) { ?>
 	  	<?php echo $banner->{ 'text'.'_'.$_SESSION['lang'] } ?>
 	  <?php } ?>
 	  
      <ul id="headlines">
 
<?php foreach ( $results['articles'] as $article ) { ?>
 		<?php	$results['ulrTitle'] = cleanURL::toAscii($article->title);?>

        <li>
          <h3>
            <span class="pubDate"><?php echo date('j F', $article->publicationDate)?></span><a href="<?php echo ( $_SESSION['lang'] .'/'.$results['categories'][$article->categoryId]->name )?>/<?php echo $results['ulrTitle']?>-<?php echo $article->id?>"><?php echo htmlspecialchars( $article->title )?></a>
          	<?php if ( $article->categoryId ) { ?>													 
            <span class="category">in <a href="<?php echo $_SESSION['lang'].'/'.( $results['categories'][$article->categoryId]->name )?>"><?php echo htmlspecialchars( $results['categories'][$article->categoryId]->name )?></a></span>
            <?php } ?>
          </h3>
          <p class="summary">
            <?php if ( $imagePath = $article->getImagePath(IMG_TYPE_THUMB) ) { ?>
              <a href="<?php echo ( $_SESSION['lang'] .'/'.$results['categories'][$article->categoryId]->name )?>/<?php echo $results['ulrTitle']?>-<?php echo $article->id?>"><img class="articleImageThumb" src="<?php echo $imagePath?>" alt="Article Thumbnail" /></a>
            <?php } ?>
         	 <?php echo htmlspecialchars( $article->summary )?>
          </p>
        </li>
 
<?php } ?>
 
      </ul>
 
      <p><a href="./archive">Article Archive</a></p>
 
<?php include "templates/include/footer.php" ?>