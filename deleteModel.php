<?php
$title = "Delete Model";
require_once 'includes/header.php';
require_once 'includes/navbar.php';
require_once 'db/conn.php';
if (isset($_GET['id'])) {
    $results = $crud->getModel($_GET['id']);
} else {
    echo "<h1> Something went wrong</h1>";
}
$validity = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["btnYes"])) {
        $results = $crud->deleteModel($_POST['id']);
    }
    header("Location: manageModels.php");
}
?>
<form style="margin-right:30%;" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"></label>
    <h1 style="text-align: center;">Model Delete</h1>
    <h2> Are you sure you want to delete <?php echo $results['name'] ?>?</h2>
    <div style="text-align: center;">
        <button type="submit" class="btn btn-default" name="btnYes">Yes</button>
        <button type="submit" class="btn btn-default" name="btnNo">No</button>
    </div>

</form>
<?php
require_once 'includes/footer.php';
?>