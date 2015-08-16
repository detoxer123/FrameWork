<?php include "templates/include/header.php" ?>
 
      <form action="admin.php?action=login" method="post" style="width: 50%;">
        <input type="hidden" name="login" value="true" />
 
<?php if ( isset( $results['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>
 
 		<h3>Admin login</h3>
 		
        <ul>
 
          <li>
          	<div class="input-group">
  				<span class="input-group-addon" id="basic-addon1">@</span>
  				<input type="text" name="username" class="form-control" placeholder="Username" aria-describedby="basic-addon1" required autofocus maxlength="20" />
			</div>
          </li>
 
          <li>
          	<div class="input-group">
  				<span class="input-group-addon" id="basic-addon1">#</span>
  				<input type="text" name="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1" required maxlength="20" />
			</div>
          </li>
 
        </ul>
 
        <div class="buttons">
          <input class="btn btn-primary btn-sm" type="submit" name="login" value="Login" />
        </div>
        
 
      </form>
<?php include "templates/include/footer.php" ?>