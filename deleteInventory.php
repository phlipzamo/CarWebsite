<?php
$title = "Delete Inventory";
require_once 'includes/header.php';
require_once 'includes/navbar.php';
require_once 'db/conn.php';
$results = false;
if (isset($_GET['id'])) {
    $inventoryItem = $crud->getInventoryItem($_GET['id']);


?>
    <form style="margin-right: 30%;" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"></label>
        <h1 style="text-align: center;">Vehicle Delete</h1>
        <h4> Are you sure you want to delete <?php echo "(" . $inventoryItem['model'] . "/" . $inventoryItem['make'] . "/" . $inventoryItem['year'] . "/" . $inventoryItem['vin'] . ")"; ?>?</h4>
        <div style="text-align: center;">
            <button type="submit" class="btn btn-default" name="btnYes">Yes</button>
            <button type="submit" class="btn btn-default" name="btnNo">No</button>
        </div>
    </form>
<?php
} else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST["btnYes"])) {
            $results = $crud->deleteInventory($_POST['id']);
            if ($results) {
                $_SESSION["successMessage"] = "The vehicle was deleted!!";
                include "includes/success.php";
            } else {
                include "includes/error.php";
            }
        } else if (isset($_POST["btnNo"])) {
            $_SESSION["warningMessage"] = "The vehicle was not deleted!!";
            include "includes/warning.php";
        }
    }
}

require_once 'includes/footer.php';
?>