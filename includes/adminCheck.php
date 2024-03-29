<?php
if(!$_SESSION['isAdmin']==1){
    header("Location: userPage.php");
}
?>