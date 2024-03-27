<?PHP
session_start();
?>

} else if (isset($_POST["submit"])) {
  
  if (!$isSuccess) {
      include "includes/error.php";
  } else {
      $_SESSION["successMessage"] = "Added new make!!";
      include "includes/success.php";
  }
}