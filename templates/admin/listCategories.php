<?php include "templates/admin/include/header.php" ?>
 
 	  <div id="container" class="col-sm-9 col-sm-offset-3">
 
      <h2>Article Categories <small>| <?php echo $results['totalRows']?> categor<?php echo ( $results['totalRows'] != 1 ) ? 'ies' : 'y' ?> in total.</small></h2>
 	  <a href="admin.php?action=newCategory" type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add a New Category</a>
<?php if ( isset( $results['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>
 
 
<?php if ( isset( $results['statusMessage'] ) ) { ?>
        <div class="statusMessage"><?php echo $results['statusMessage'] ?></div>
<?php } ?>
 
      <table>
        <tr>
          <th>Category</th>
        </tr>
 
<?php foreach ( $results['categories'] as $category ) { ?>
 
        <tr onclick="location='admin.php?action=editCategory&amp;categoryId=<?php echo $category->id?>'">
          <td>
            <?php echo $category->name?>
          </td>
        </tr>
 
<?php } ?>
 
      </table>
 

 
<?php include "templates/admin/include/footer.php" ?>