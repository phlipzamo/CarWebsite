<?php
$title = "Edit Inventory";
require_once 'includes/header.php';
require_once 'includes/navbar.php';
require_once 'db/conn.php';
$modelAndMake = $crud->getModelAndMake();
$types = $crud->getTypes();
$powerTypes = $crud->getPowerTypes();
if (isset($_GET['id'])) {
  $inventoryItem = $crud->getInventoryItem($_GET['id']);
} else {
  echo "<h1> Something went wrong</h1>";
}
if (isset($_POST["submit"])) {
  $id = $_POST['id'];

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

  $isSuccess = $crud->updateInventory(
    $id,
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
  header("Location: manageInventory.php");
}
?>
<form style="width: 90%;" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" class="row g-3">
  <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"></label>
  <div class="col-md-4">
    <label for="exampleFormControlSelect1">Model</label>
    <select style="margin-top: 2%;" class="form-control" id="exampleFormControlSelect1" name="model" required>
      <?php while ($r = $modelAndMake->fetch(PDO::FETCH_ASSOC)) { ?>
        <?php
        $option = "<option";
        if ($inventoryItem['model'] == $r["name"]) {
          $option .= " selected";
        }
        $option .= ">" . $r["name"] . "(" . $r["make"] . ")" . "</option>";
        echo $option;
        ?>
      <?php } ?>
    </select>
  </div>

  <div class="col-md-4">
    <label for="validationServer01" class="form-label">Year</label>
    <input type="text" class="form-control" id="validationServer01" value="<?php echo $inventoryItem['year'] ?>" name="year" required>
  </div>

  <div class="col-md-4">
    <label for="validationServer02" class="form-label">Color</label>
    <input type="text" class="form-control" id="validationServer02" value="<?php echo $inventoryItem['color'] ?>" name="color" required>
  </div>

  <div class="col-md-4">
    <label for="validationServerVin" class="form-label">VIN</label>
    <div class="input-group has-validation">
      <input type="text" class="form-control" id="validationServerVin" name="vin" value="<?php echo $inventoryItem['vin'] ?>" required>
    </div>
  </div>

  <div class="col-md-4">
    <label for="exampleFormControlSelect1">Type</label>
    <select style="margin-top: 2%;" class="form-control" id="exampleFormControlSelect1" name="type" required>
      <?php while ($r = $types->fetch(PDO::FETCH_ASSOC)) { ?>
        <?php
        $option = "<option";
        if ($inventoryItem['type'] == $r["name"]) {
          $option .= " selected";
        }
        $option .= ">" . $r["name"] . "</option>";
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
        $option = "<option";
        if ($inventoryItem['power'] == $r["name"]) {
          $option .= " selected";
        }
        $option .= ">" . $r["name"] . "</option>";
        echo $option;
        ?>
      <?php } ?>
    </select>
  </div>

  <div class="col-md-4">
    <label for="purchaseDatePicker" class="form-label">Purchase Date</label>
    <div class="input-group has-validation">
      <input type="text" class="form-control" name="purchaseDate" value="<?php echo $inventoryItem['dealer_purchase_date'] ?>" id="purchaseDatePicker" required>
    </div>
  </div>

  <div class="col-md-4">
    <label for="validationServerPurchasePrice" class="form-label">Purchase Price</label>
    <div class="input-group has-validation">
      <input type="text" class="form-control" id="validationServerPurchasePrice" name="purchasePrice" value="<?php echo $inventoryItem['dealer_purchase_price'] ?>" required>
    </div>
  </div>

  <div class="col-md-4">
    <label for="validationServerType" class="form-label">Sold Date</label>
    <div class="input-group has-validation">
      <input type="text" class="form-control" id="soldDatePicker" name="soldDate" value="<?php echo $inventoryItem['sold_date'] ?>">
    </div>
  </div>

  <div class="col-md-4">
    <label for="validationServerType" class="form-label">Sold Price</label>
    <div class="input-group has-validation">
      <input type="text" class="form-control" id="validationServerUsername" name="soldPrice" value="<?php echo $inventoryItem['sold_price'] ?>">
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationServerModel" class="form-label">Additional Cost</label>
    <div class="input-group has-validation">
      <input type="text" class="form-control" id="validationServerModel" name="addCost" value="<?php echo $inventoryItem['additional_cost'] ?>">
    </div>
  </div>

  <div class="col-md-4">
    <button style="margin-top: 8%; " class="btn btn-default" type="submit" name="submit">Submit form</button>
  </div>
</form>
<?php
require_once 'includes/footer.php';
?>