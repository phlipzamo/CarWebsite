    <div class="navbarAndBody">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a <?php echo (basename($_SERVER['SCRIPT_NAME']) == "homePage.php") ? "class= \"active\"": '';?> aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a <?php echo (basename($_SERVER['SCRIPT_NAME']) == "manageUsers.php") ? "class= \"active\"": '';?> aria-current="page" href="manageUsers.php">Manage Users</a>
            </li>
            <li class="nav-item">
                <a <?php echo (basename($_SERVER['SCRIPT_NAME']) == "manageVehicles.php") ? "class= \"active\"": '';?> aria-current="page" href="manageVehicles.php">Manage Vehicles</a>
            </li>
            <li class="nav-item">
                <a  <?php echo (basename($_SERVER['SCRIPT_NAME']) == "manageInventory.php") ? "class= \"active\"": '';?> aria-current="page" href="manageInventory.php">Manage Inventory</a>
            </li>
            <li class="nav-item">
                <a aria-current="page" href="login.php">Logout</a>
            </li>
        </ul>

            

<?php
    if(isset($_SESSION['id'])){
?>
<div>
    <h4> You are currently logged in as: <?php echo $_SESSION['username']?></h4>
</div>
<div></div>

<?php
    }
?>
      