<?php
$title = "New User";
require_once 'includes/header.php';
require_once 'includes/navbar.php';
require_once 'db/conn.php';
$modelAndMake = $crud->getModelAndMake();
$types = $crud->getTypes();
$powerTypes = $crud->getPowerTypes();
if (!isset($_POST["submit"])) {
?>
<form style="width: 90%;" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" class="row g-3">

  <div class="col-md-4">
    <label for="exampleFormControlSelect1">Model</label>
    <select style="margin-top: 2%;" class="form-control" id="exampleFormControlSelect1" name="model" required>
      <?php while ($r = $modelAndMake->fetch(PDO::FETCH_ASSOC)) { ?>
        <?php
        $option = "<option>" . $r["name"] . "(" . $r["make"] . ")" . "</option>";
        echo $option;
        ?>
      <?php } ?>
    </select>
  </div>

  <div class="col-md-4">
    <label for="validationServer01" class="form-label">Year</label>
    <input type="text" class="form-control" id="validationServer01" value="" name="year" required>
  </div>

  <div class="col-md-4">
    <label for="validationServer02" class="form-label">Color</label>
    <input type="text" class="form-control" id="validationServer02" value="" name="color" required>
  </div>

  <div class="col-md-4">
    <label for="validationServerVin" class="form-label">VIN</label>
    <div class="input-group has-validation">
      <input type="text" class="form-control" id="validationServerVin" name="vin" required>
    </div>
  </div>

  <div class="col-md-4">
    <label for="exampleFormControlSelect1">Type</label>
    <select style="margin-top: 2%;" class="form-control" id="exampleFormControlSelect1" name="type" required>
      <?php while ($r = $types->fetch(PDO::FETCH_ASSOC)) { ?>
        <?php
        $option = "<option>" . $r["name"] . "</option>";
        echo $option;
        ?>
      <?php } ?>
    </select>
  </div>

  <div class="col-md-4">
    <label for="exampleFormControlSelect1">Power Type</label>
    <select style="margin-top: 2%;" class="form-control" id="exampleFormControlSelect1" name="powerType" required>
      <?php while ($r = $powerTypes->fetch(PDO::FETCH_ASSOC)) { ?>
        <?php
        $option = "<option>" . $r["name"] . "</option>";
        echo $option;
        ?>
      <?php } ?>
    </select>
  </div>

  <div class="col-md-4">
    <label for="validationServerType" class="form-label">Purchase Date</label>
    <div class="input-group has-validation">
      <input type="text" class="form-control" id="purchaseDatePicker" name="purchaseDate" required>
    </div>
  </div>

  <div class="col-md-4">
    <label for="validationServerPurchasePrice" class="form-label">Purchase Price</label>
    <div class="input-group has-validation">
      <input type="text" class="form-control" id="validationServerPurchasePrice" name="purchasePrice" required>
    </div>
  </div>

  <div class="col-md-4">
    <label for="validationServerType" class="form-label">Sold Date</label>
    <div class="input-group has-validation">
      <input type="text" class="form-control" id="soldDatePicker" name="soldDate" >
    </div>
  </div>

  <div class="col-md-4">
    <label for="validationServerType" class="form-label">Sold Price</label>
    <div class="input-group has-validation">
      <input type="text" class="form-control" id="validationServerUsername" name="soldPrice" >
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationServerModel" class="form-label">Additional Cost</label>
    <div class="input-group has-validation">
      <input type="text" class="form-control" id="validationServerModel" name="addCost" >
    </div>
  </div>

  <div class="col-md-4">
    <button style="margin-top: 8%; " class="btn btn-default" type="submit" name="submit">Submit form</button>
  </div>
</form>
<?php
} else if (isset($_POST["submit"])) {
  $modelStr = explode("(", $_POST["model"]);
  $modelID = $crud->getModelId($modelStr[0]);
  $year = $_POST["year"];
  $color = $_POST["color"];
  $vehicleTypeID = $crud->getTypeId($_POST["type"]);
  $vehiclePowerTypeID = $crud->getPowerTypesId($_POST["powerType"]);
  $vin = $_POST["vin"];
  $purchaseDate = $_POST["purchaseDate"];
  $purchasePrice = $_POST["purchasePrice"];
  $soldDate = ($_POST["soldDate"] == "") ? null : $_POST["soldDate"];
  $soldPrice = ($_POST["soldPrice"] == "") ? null : $_POST["soldPrice"];
  $addCost = ($_POST["addCost"] == "") ? null : $_POST["addCost"];

  $isSuccess = $crud->insertInventory(
    $modelID[0],
    $year,
    $color,
    $vehicleTypeID[0],
    $vehiclePowerTypeID[0],
    $vin,
    $purchaseDate,
    $purchasePrice,
    $soldDate,
    $soldPrice,
    $addCost
  );
  //header("Location: manageInventory.php");  
  if (!$isSuccess) {
      include "includes/error.php";
  } else {
      $_SESSION["successMessage"] = "Added new Vehicle!!";
      include "includes/success.php";
  }
}
require_once 'includes/footer.php';
?>