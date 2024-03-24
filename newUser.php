<?php 
    $title ="New User";
    require_once 'includes/header.php'; 
    require_once 'includes/navbar.php'; 
    require_once 'db/conn.php';
?>
<form method = "post" action= "success.php" class="row g-3">

<div class="col-md-4">
    <label for="validationServerUsername" class="form-label">Username</label>
    <div class="input-group has-validation">
      <input type="text" class="form-control" id="validationServerUsername" name="username" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required>
      
    </div>
  </div>
  
  <div class="col-md-4">
    <label for="validationServer01" class="form-label">First name</label>
    <input type="text" class="form-control" id="validationServer01" value="" name="firstName" required>
  </div>
  <div class="col-md-4">
    <label for="validationServer02" class="form-label">Last name</label>
    <input type="text" class="form-control" id="validationServer02" value="" name="lastName" required>
  </div>

  <div class="col-md-4">
    <label for="validationServerUsername" class="form-label">Email</label>
    <div class="input-group has-validation">
      <input type="text" class="form-control" id="validationServerUsername" name="email" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required>
    </div>
  </div>
  
  <div class="col-md-4">
    <label for="validationServerPassword" class="form-label">Password</label>
    <div class="input-group has-validation">
      <input type="password" class="form-control" id="validationServerUsername" name="password" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required>
    </div>
  </div>
  <div class="col-md-4">
    <label></label>
    <div class = "form-check">
      <input type="checkbox" id="isAdmin" name="isAdmin">
      <label for="isAdmin"> Is Admin</label><br>
    </div> 
  </div>

  <div class="col-12">
    <button class="btn btn-primary" type="submit" name="submit" >Submit form</button>
  </div>
</form>
<?php 
    require_once 'includes/footer.php'; 
?>
