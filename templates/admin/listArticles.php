<?php
	header('Content-Type: text/html; charset=UTF-8');
	include "templates/admin/include/header.php"
?>
 	  <div id="container" class="col-sm-9 col-sm-offset-3">
 
      <h2>All Articles <small>| <?php echo $results['totalRows']?> article<?php echo ( $results['totalRows'] != 1 ) ? 's' : '' ?> in total.</small></h2>
      <a href="admin.php?action=newArticle" type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add a New Article</a>
<?php if ( isset( $results['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>
 
 
<?php if ( isset( $results['statusMessage'] ) ) { ?>
        <div class="statusMessage"><?php echo $results['statusMessage'] ?></div>
<?php } ?>
 
      <table>
        <tr>
          <th>Publication Date</th>
          <th>Title</th>
          <th>Category</th>
        </tr>
 
<?php foreach ( $results['articles'] as $article ) { ?>
 
        <tr onclick="location='admin.php?action=editArticle&amp;articleId=<?php echo $article->id?>'">
          <td><?php echo date('j M Y', $article->publicationDate)?></td>
          <td>
            <?php echo $article->title?>
          </td>
          <td>
            <?php echo $results['categories'][$article->categoryId]->name?>
          </td>
        </tr>
 
<?php } ?>
 
      </table>
 
<?php include "templates/admin/include/footer.php" ?>