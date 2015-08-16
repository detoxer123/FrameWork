<?php include "templates/include/header.php" ?>
 	  <div id="breadcrumb"><?php echo $breadcr->breadcrumbs; ?></div>
      <h1><?php echo htmlspecialchars( $results['pageHeading'] ) ?></h1>
		<?php if ( $results['category'] ) { ?>
		      <h3 class="categoryDescription"><?php echo htmlspecialchars( $results['category']->description ) ?></h3>
		<?php } ?>
 	  <?php echo $results['pagination'] ?>
      <ul id="headlines" class="archive">
 <?php //var_dump($results); die(); ?>
<?php foreach ( $results['articles'] as $article ) { ?>
		
		<?php	$results['ulrTitle'] = cleanURL::toAscii($article->title);?>
 		<?php //echo ( $results['categories'][$article->categoryId]->name ); die(); ?>
        <li>
          <h3>
            <span class="pubDate"><?php echo date('j F Y', $article->publicationDate)?></span><a href=" <?php echo $_SESSION['lang'] .'/'.( $results['categories'][$article->categoryId]->name ); ?>/<?php echo $results['ulrTitle']?>-<?php echo $article->id?> "><?php echo htmlspecialchars( $article->title )?></a>
          	<?php if ( !$results['category'] && $article->categoryId ) { ?>
            <span class="category">in <a href="<?php echo $_SESSION['lang'] .'/'.( $results['categories'][$article->categoryId]->name )?>"><?php echo htmlspecialchars( $results['categories'][$article->categoryId]->name ) ?></a></span>
			<?php } ?>    
          </h3>
          <p class="summary">
            <?php if ( $imagePath = $article->getImagePath( IMG_TYPE_THUMB ) ) { ?>
              <a href=" <?php echo $_SESSION['lang'] .'/'.( $results['categories'][$article->categoryId]->name ); ?>/<?php echo $results['ulrTitle']?>-<?php echo $article->id?> "><img class="articleImageThumb" src="<?php echo $imagePath?>" alt="Article Thumbnail" /></a>
            <?php } ?>
          <?php echo htmlspecialchars( $article->summary )?>
          </p>
        </li>
 
<?php } ?>
 
      </ul>
 		<?php echo $results['pagination'] ?>
      <p><?php echo $results['totalRows']?> article<?php echo ( $results['totalRows'] != 1 ) ? 's' : '' ?> in total.</p>
 
      <p><a href="./<?php echo $_SESSION['lang'] ?>">Return to Homepage</a></p>
 
<?php include "templates/include/footer.php" ?>