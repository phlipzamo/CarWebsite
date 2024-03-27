<?php
$title = "New Model";
require_once 'includes/header.php';
require_once 'includes/navbar.php';
require_once 'db/conn.php';
$results = $crud->getMakes();

if (!isset($_POST["submit"])) {

?>
    <form style="width: 80%;" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" class="row g-3">
        <div class="col-md-4">
            <label for="exampleFormControlSelect1">Make</label>
            <select class="form-control" id="exampleFormControlSelect1" name="make" required>
                <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option><?php echo $r["make"]; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="col-md-8"></div>
        <div class="col-md-4">
            <label for="validationServerMake" class="form-label">Model</label>
            <div class="input-group has-validation">
                <input type="text" class="form-control" id="validationServerMake" name="model" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-default" type="submit" name="submit">Submit form</button>
        </div>
    </form>
<?php
} else if (isset($_POST["submit"])) {
    $makeId = $crud->getMakeIdFromName($_POST['make']);
    $model = $_POST['model'];
    $isSuccess = $crud->insertModel($model, $makeId[0]);
    //header("Location:manageModels.php");
    if (!$isSuccess) {
        include "includes/error.php";
    } else {
        $_SESSION["successMessage"] = "Added new model!!";
        include "includes/success.php";
    }
}

require_once 'includes/footer.php';
?>