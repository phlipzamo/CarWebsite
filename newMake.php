<?php
$title = "New Make";
require_once 'includes/header.php';
require_once 'includes/navbar.php';
require_once 'includes/adminCheck.php';
require_once 'db/conn.php';
if (!isset($_POST["submit"])) {
?>
  <form style="width: 60%;" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" class="row g-3">

    <div class="col-md-4">
      <label for="validationServerMake" class="form-label">Make</label>
      <div class="input-group has-validation">
        <input type="text" class="form-control" id="validationServerMake" name="make" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required>
      </div>
    </div>
    <div class="col-12">
      <button class="btn btn-default" type="submit" name="submit">Submit form</button>
    </div>
  </form>
<?php
} else if (isset($_POST["submit"])) {
  $make = $_POST['make'];
  $isSuccess = $crud->insertMake($make);
  //header("Location: manageMakes.php");
  if (!$isSuccess) {
    include "includes/error.php";
  } else {
    $_SESSION["successMessage"] = "Added new make!!";
    include "includes/success.php";
  }
}
require_once 'includes/footer.php';
?>