<?php
$title = "Feeback form";
require_once 'includes/header.php';
if (!isset($_POST["submit"])) {
?>
    <div class="container mt-3">
        <h2>Feedback Form</h2>
        <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" id="feedbackForm">
            <div class="mb-3">
                <label for="name" class="form-label">Your Name</label>
                <input type="text" class="form-control" id="name" aria-describedby="nameHelp">
                <div id="nameHelp" class="form-text">We won't share your name publicly.</div>
            </div>
            <div class="mb-3">
                <label for="feedback" class="form-label">Feedback</label>
                <textarea class="form-control" id="feedback" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-default" name="submit">Submit Feedback</button>
        </form>
    </div>
<?php
} else {
    if ($_SESSION['isAdmin'] == 1) {
        header("refresh:1;url=adminPage.php");
        $_SESSION["successMessage"] = "Your feedback was submitted!";
        include "includes/success.php";
    } else {
        header("refresh:1;url=userPage.php");
        $_SESSION["successMessage"] = "Your feedback was submitted!";
        include "includes/success.php";
    }
}
?>