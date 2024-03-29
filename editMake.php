<?php
$title = "Edit Make";
require_once 'includes/header.php';
require_once 'includes/navbar.php';
require_once 'includes/adminCheck.php';
require_once 'db/conn.php';
if (isset($_GET['id'])) {
  $results = $crud->getMake($_GET['id']);
}
if (!isset($_POST["submit"])) {
?>
  <form style="width: 60%;" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" class="row g-3">
    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"></label>
    <div class="col-md-4">
      <label for="validationServerMake" class="form-label">Make</label>
      <div class="input-group has-validation">
        <input type="text" class="form-control" id="validationServerUsername" name="make" value=<?php echo $results["make"] ?> aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required>
      </div>
    </div>
    <div class="col-12">
      <button class="btn btn-default" type="submit" name="submit">Save Changes</button>
    </div>
  </form>
<?php

} else if (isset($_POST["submit"])) {
  $make = $_POST['make'];
  $id = $_POST['id'];
  $isSuccess = $crud->updateMake($id, $make);
  //header("Location: manageMakes.php");
  if (!$isSuccess) {
    include "includes/error.php";
  } else {
    $_SESSION["successMessage"] = "Make Updated!!";
    include "includes/success.php";
  }
}
require_once 'includes/footer.php';
?>