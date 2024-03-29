<?php
$title = "Delete Make";
require_once 'includes/header.php';
require_once 'includes/navbar.php';
require_once 'includes/adminCheck.php';
require_once 'db/conn.php';
if (isset($_GET['id'])) {
    $results = $crud->getMake($_GET['id']);
?>
    <form style="margin-right:30%;" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"></label>
        <h1 style="text-align: center;">Make Delete</h1>
        <h2> Are you sure you want to delete <?php echo $results['make'] ?>?</h2>
        <div style="text-align: center;">
            <button type="submit" class="btn btn-default" name="btnYes">Yes</button>
            <button type="submit" class="btn btn-default" name="btnNo">No</button>
        </div>
    </form>
<?php
} else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST["btnYes"])) {
            $results = $crud->deleteMake($_POST['id']);
            if ($results) {
                $_SESSION["successMessage"] = "The make was deleted!!";
                include "includes/success.php";
            } else {
                include "includes/error.php";
            }
            //header("Location: manageMakes.php"); 
        } else if (isset($_POST["btnNo"])) {
            $_SESSION["warningMessage"] = "The make was not deleted!!";
            include "includes/warning.php";
        }
    }
}

require_once 'includes/footer.php';
?>