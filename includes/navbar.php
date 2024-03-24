    <?php
    
    function createTab(string $href, string $name ) {
        
        return "
        <li class=\"nav-item\">
            <a  class= \"active\" aria-current=\"page\" href=$href >$name</a> 
        </li>";
    }
    //This is logic for what page am I on and how does that effeect my navebar and session.
    switch (true) {
        case basename($_SERVER['SCRIPT_NAME'])=="adminPage.php":
            $navBarElements = createTab( "index.php", "Logout").
                createTab( "manageUsers.php", "Manage Users").
                createTab("manageVehicles.php", "Manage Vehicles").
                createTab( "manageInventory.php", "Manage Inventory");
            break;
        case basename($_SERVER['SCRIPT_NAME'])=="manageVehicles.php":
            $navBarElements = createTab( "index.php", "Logout").
                createTab( "vehicleMakes.php", "Vehicle Makes").
                createTab( "vehicleModels.php", "Vehicle Models").
                createTab("adminPage.php", "Admin Page");
            break;
        case basename($_SERVER['SCRIPT_NAME'])=="manageUsers.php"||basename($_SERVER['SCRIPT_NAME'])=="newUser.php"
            ||basename($_SERVER['SCRIPT_NAME'])=="editUser.php"||basename($_SERVER['SCRIPT_NAME'])=="deleteUser.php":
            $navBarElements = createTab( "index.php", "Logout").
                createTab( "newUser.php", "New User").
                createTab("adminPage.php", "Admin Page");   
            break;
        
        case basename($_SERVER['SCRIPT_NAME'])=="vehicleMakes.php"||basename($_SERVER['SCRIPT_NAME'])=="newMake.php"
            ||basename($_SERVER['SCRIPT_NAME'])=="editMake.php"||basename($_SERVER['SCRIPT_NAME'])=="deleteMake.php":
            $navBarElements = createTab( "index.php", "Logout").
                createTab( "newMake.php", "New Make").
                createTab( "manageVehicles.php", "Manage Vehicles").
                createTab( "adminPage.php", "Admin Page");
            break;
        case basename($_SERVER['SCRIPT_NAME'])=="vehicleModels.php"||basename($_SERVER['SCRIPT_NAME'])=="newModel.php"
            ||basename($_SERVER['SCRIPT_NAME'])=="editModel.php"||basename($_SERVER['SCRIPT_NAME'])=="deleteModel.php":
            $navBarElements = createTab( "index.php", "Logout").
                createTab( "newModel.php", "New Model").
                createTab( "manageVehicles.php", "Manage Vehicles").
                createTab( "adminPage.php", "Admin Page");
            break;
        case basename($_SERVER['SCRIPT_NAME'])=="manageInventory.php"://TODO
            $navBarElements = createTab( "index.php", "Logout").
                createTab( "manageUsers.php", "Manage Users").
                createTab( "manageVehicles.php", "Manage Vehicles").
                createTab( "manageInventory.php", "Manage Inventory");
            break;
        case basename($_SERVER['SCRIPT_NAME'])=="index.php":
            $navBarElements = createTab( "login.php", "Login");
            session_destroy();
            session_unset();
            session_start();
            break;
        case basename($_SERVER['SCRIPT_NAME'])=="login.php":
            $navBarElements = createTab( "index.php", "Home Page");
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
      