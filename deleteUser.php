<?php
$title = "Delete User";
require_once 'includes/header.php';
require_once 'includes/navbar.php';
require_once 'includes/adminCheck.php';
require_once 'db/conn.php';
if (isset($_GET['userId'])) {
    $results = $userClass->getUserInfo($_GET['userId']);
?>
    <form style="margin-right:30%;" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
        <input type="hidden" name="userId" value="<?php echo $_GET['userId'] ?>"></label>
        <h1 style="text-align: center;">User Delete</h1>
        <h2> Are you sure you want to delete <?php echo $results['first_name'] . "" . $results['last_name'] ?>?</h2>
        <div style="text-align: center;">
            <button type="submit" class="btn btn-default" name="btnYes">Yes</button>
            <button type="submit" class="btn btn-default" name="btnNo">No</button>
        </div>

    </form>
<?php
} else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST["btnYes"])) {
            $results = $userClass->deleteUser($_POST['userId']);
            if ($results) {
                $_SESSION["successMessage"] = "The model was deleted!!";
                include "includes/success.php";
            } else {
                include "includes/error.php";
            }
            //header("Location: manageUsers.php");;
        } else if (isset($_POST["btnNo"])) {
            $_SESSION["warningMessage"] = "The model was not deleted!!";
            include "includes/warning.php";
        }
    }
}
require_once 'includes/footer.php';
?>