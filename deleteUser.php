<?php 
    $title ="Manage Inventory";
    require_once 'includes/header.php'; 
    require_once 'includes/navbar.php';  
    require_once 'db/conn.php';
    if (isset($_GET['userId'])){
        $results = $userClass->getUserInfo($_GET['userId']);
        echo $results['user_id'];
    }
    else{
        echo "<h1> Something went wrong</h1>";
    }
    $validity = "";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST["btnYes"])){
            $results = $userClass->deleteUser($_POST['userId']);
            header("Location: manageUsers.php");
        }  
        else if(isset($_POST["btnNo"])) {
            header("Location: manageUsers.php");
        } 
} 

?>
    <form method= "post" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>">  
        <input type="hidden" name = "userId" value = "<?php echo $_GET['userId']?>"></label>
        <h1>User Delete</h1>
        <h2> Are you sure you want to delete <?php echo $results['first_name']."".$results['last_name']?>?</h2>
        <button type="submit" class="btn btn-default" name="btnYes">Yes</button>
        <button type="submit" class="btn btn-default" name="btnNo">No</button>
    </form>
<?php 
    require_once 'includes/footer.php'; 
?>