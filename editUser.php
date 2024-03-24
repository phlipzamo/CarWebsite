<?php 
    $title ="Edit User";
    require_once 'includes/header.php'; 
    require_once 'includes/navbar.php'; 
    require_once 'db/conn.php';
    if (isset($_GET['userId'])){
        $results = $userClass->getUserInfo($_GET['userId']);
    }
    else{
        echo "<h1> Something went wrong</h1>";
    }
?>
<form method = "post" action= "editPostUser.php" class="row g-3">
<input type="hidden" name = "userId" value = "<?php echo $_GET['userId']?>"></label>
<div class="col-md-4">
    <label for="validationServerUsername" class="form-label">Username</label>
    <div class="input-group has-validation">
      <input type="text" class="form-control" id="validationServerUsername" name="username" value = <?php echo $results["user_name"]?> aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required>
      
    </div>
  </div>
  
  <div class="col-md-4">
    <label for="validationServer01" class="form-label">First name</label>
    <input type="text" class="form-control" id="validationServer01" value = <?php echo $results["first_name"]?> name="firstName" required>
  </div>
  <div class="col-md-4">
    <label for="validationServer02" class="form-label">Last name</label>
    <input type="text" class="form-control" id="validationServer02" value = <?php echo $results["last_name"]?> name="lastName" required>
  </div>

  <div class="col-md-4">
    <label for="validationServerUsername" class="form-label">Email</label>
    <div class="input-group has-validation">
      <input type="text" class="form-control" id="validationServerUsername" name="email" value = <?php echo $results["email"]?> aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required>
    </div>
  </div>
  
  <div class="col-md-4">
    <label for="validationServerPassword" class="form-label">Password</label>
    <div class="input-group has-validation">
      <input type="password" class="form-control" id="validationServerUsername" name="password"  aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback">
    </div>
  </div>
  <div class="col-md-4">
    <label></label>
    <div class = "form-check">
      <input type="checkbox" id="isAdmin" name="isAdmin" value = <?php if($results["is_admin"]==1){echo "checked";}?>>
      <label for="isAdmin"> Is Admin</label><br>
    </div> 
  </div>

  <div class="col-12">
    <button class="btn btn-default" type="submit" name="submit" >Save Changes</button>
  </div>
</form>
<?php 
    require_once 'includes/footer.php'; 
?>
