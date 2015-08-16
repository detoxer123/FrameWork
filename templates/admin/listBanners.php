<?php
	header('Content-Type: text/html; charset=UTF-8');
	include "templates/admin/include/header.php"
?>
 	  <div id="container" class="col-sm-9 col-sm-offset-3">
 
      <h2>All Banners <small>| <?php echo $results['totalRows']?> banner<?php echo ( $results['totalRows'] != 1 ) ? 's' : '' ?> in total.</small></h2>
      <a href="admin.php?action=newBanner" type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add a New Banner</a>
<?php if ( isset( $results['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>
 
 
<?php if ( isset( $results['statusMessage'] ) ) { ?>
        <div class="statusMessage"><?php echo $results['statusMessage'] ?></div>
<?php } ?>
 
      <table>
        <tr>
          <th>Publication Date</th>
		  <th>Revocation Date</th>
          <th>Text - hungarian</th>
          <th>Text - english</th>
        </tr>
 
<?php foreach ( $results['banners'] as $banner ) { ?>
 
        <tr onclick="location='admin.php?action=editBanner&amp;bannerId=<?php echo $banner->id?>'">
          <td><?php echo date('j M Y', $banner->Sdate)?></td>
          <td><?php echo date('j M Y', $banner->Edate)?></td>
          <td>
            <?php echo $banner->text_hu?>
          </td>
          <td>
            <?php echo $banner->text_en?>
          </td>
        </tr>
 
<?php } ?>
 
      </table>
 
<?php include "templates/admin/include/footer.php" ?>