    <?php
    
    function createTab(bool $isActive, string $href, string $name ) {
        $active = ($isActive)?"class= \"active\"": ''; 
        return "
        <li class=\"nav-item\">
            <a  $active aria-current=\"page\" href=$href >$name</a> 
        </li>";
    }
    //This is logic for what page am I on and how does that effeect my navebar and session.
    switch (true) {
        case basename($_SERVER['SCRIPT_NAME'])=="adminPage.php":
            $navBarElements = createTab(false, "index.php", "Logout").
                createTab(false, "manageUsers.php", "Manage Users").
                createTab(false, "manageVehicles.php", "Manage Vehicles").
                createTab(false, "manageInventory.php", "Manage Inventory");
            break;
        case basename($_SERVER['SCRIPT_NAME'])=="manageVehicles.php":
            $navBarElements = createTab(false, "index.php", "Logout").
                createTab(false, "vehicleMakes.php", "Vehicle Makes").
                createTab(false, "vehicleModels.php", "Vehicle Models").
                createTab(false, "adminPage.php", "Admin Page");
            break;
        case basename($_SERVER['SCRIPT_NAME'])=="manageUsers.php"||basename($_SERVER['SCRIPT_NAME'])=="newUser.php"
            ||basename($_SERVER['SCRIPT_NAME'])=="editUser.php"||basename($_SERVER['SCRIPT_NAME'])=="deleteUser.php":
            $navBarElements = createTab(false, "index.php", "Logout").
                createTab(false, "newUser.php", "New User").
                createTab(false, "adminPage.php", "Admin Page");   
            break;
        
        case basename($_SERVER['SCRIPT_NAME'])=="vehicleMakes.php"||basename($_SERVER['SCRIPT_NAME'])=="newMake.php"
            ||basename($_SERVER['SCRIPT_NAME'])=="editMake.php"||basename($_SERVER['SCRIPT_NAME'])=="deleteMake.php":
            $navBarElements = createTab(false, "index.php", "Logout").
                createTab(false, "newMake.php", "New Make").
                createTab(false, "manageVehicles.php", "Manage Vehicles").
                createTab(false, "adminPage.php", "Admin Page");
            break;
        case basename($_SERVER['SCRIPT_NAME'])=="vehicleModels.php"||basename($_SERVER['SCRIPT_NAME'])=="newModel.php"
            ||basename($_SERVER['SCRIPT_NAME'])=="editModel.php"||basename($_SERVER['SCRIPT_NAME'])=="deleteModel.php":
            $navBarElements = createTab(false, "index.php", "Logout").
                createTab(false, "newModel.php", "New Model").
                createTab(false, "manageVehicles.php", "Manage Vehicles").
                createTab(false, "adminPage.php", "Admin Page");
            break;
        case basename($_SERVER['SCRIPT_NAME'])=="manageInventory.php"://TODO
            $navBarElements = createTab(false, "index.php", "Logout").
                createTab(false, "manageUsers.php", "Manage Users").
                createTab(false, "manageVehicles.php", "Manage Vehicles").
                createTab(true, "manageInventory.php", "Manage Inventory");
            break;
        case basename($_SERVER['SCRIPT_NAME'])=="index.php":
            $navBarElements = createTab(true, "login.php", "Login");
            session_destroy();
            session_unset();
            session_start();
            break;
        case basename($_SERVER['SCRIPT_NAME'])=="login.php":
            $navBarElements = createTab(true, "index.php", "Home Page");
            $loginMessage = false;
            break;
        default:        
      };
    ?>
    <div class="navbarAndBody">
        <ul class="nav flex-column">
            <?php 
                echo $navBarElements
            ?>
        </ul>
        
            

<?php
    if(isset($_SESSION['user_id'])){
?>
<div>
    <h4> You are currently logged in as: <?php echo $_SESSION['username']?></h4>
<?php
    }
?>
      