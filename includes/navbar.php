<?php

function createTab(string $href, string $name)
{

    return "
        <li class=\"nav-item\">
            <a  class= \"active\" aria-current=\"page\" href=$href >$name</a> 
        </li>";
}
//This is logic for what page am I on and how does that effeect my navebar and session.
switch (true) {
    case basename($_SERVER['SCRIPT_NAME']) == "adminPage.php":
        $navBarElements = createTab("index.php", "Logout") .
            createTab("manageUsers.php", "Manage Users") .
            createTab("manageVehicles.php", "Manage Vehicles") .
            createTab("manageInventory.php", "Manage Inventory");
        break;
    case basename($_SERVER['SCRIPT_NAME']) == "userPage.php":
        $navBarElements = createTab("index.php", "Logout") .
            createTab("manageInventory.php", "Manage Inventory");
        break;
    case basename($_SERVER['SCRIPT_NAME']) == "manageVehicles.php":
        $navBarElements = createTab("index.php", "Logout") .
            createTab("manageMakes.php", "Vehicle Makes") .
            createTab("manageModels.php", "Vehicle Models") .
            createTab("adminPage.php", "Admin Page");
        break;
    case basename($_SERVER['SCRIPT_NAME']) == "manageUsers.php" || basename($_SERVER['SCRIPT_NAME']) == "newUser.php"
        || basename($_SERVER['SCRIPT_NAME']) == "editUser.php" || basename($_SERVER['SCRIPT_NAME']) == "deleteUser.php":
        $navBarElements = createTab("index.php", "Logout") .
            createTab("newUser.php", "New User") .
            createTab("adminPage.php", "Admin Page");
        break;

    case basename($_SERVER['SCRIPT_NAME']) == "manageMakes.php" || basename($_SERVER['SCRIPT_NAME']) == "newMake.php"
        || basename($_SERVER['SCRIPT_NAME']) == "editMake.php" || basename($_SERVER['SCRIPT_NAME']) == "deleteMake.php":
        $navBarElements = createTab("index.php", "Logout") .
            createTab("newMake.php", "New Make") .
            createTab("manageVehicles.php", "Manage Vehicles") .
            createTab("adminPage.php", "Admin Page");
        break;
    case basename($_SERVER['SCRIPT_NAME']) == "manageModels.php" || basename($_SERVER['SCRIPT_NAME']) == "newModel.php"
        || basename($_SERVER['SCRIPT_NAME']) == "editModel.php" || basename($_SERVER['SCRIPT_NAME']) == "deleteModel.php":
        $navBarElements = createTab("index.php", "Logout") .
            createTab("newModel.php", "New Model") .
            createTab("manageVehicles.php", "Manage Vehicles") .
            createTab("adminPage.php", "Admin Page");
        break;
    case basename($_SERVER['SCRIPT_NAME']) == "manageInventory.php" || basename($_SERVER['SCRIPT_NAME']) == "newInventory.php"
        || basename($_SERVER['SCRIPT_NAME']) == "editInventory.php" || basename($_SERVER['SCRIPT_NAME']) == "deleteInventory.php":
        $navBarElements = createTab("index.php", "Logout") .
            createTab("newInventory.php", "New Vehicle") .
            createTab("manageInventory.php", "Manage Inventory");
        if ($_SESSION['isAdmin'] == 1) {
            $navBarElements .= createTab("adminPage.php", "Admin Page");
        } else {
            $navBarElements .= createTab("userPage.php", "User Page");
        }
        break;
    case basename($_SERVER['SCRIPT_NAME']) == "index.php":
        session_destroy();
        session_unset();
        session_start();
        $navBarElements = createTab("login.php", "Login");
        break;
    case basename($_SERVER['SCRIPT_NAME']) == "login.php":
        $navBarElements = createTab("index.php", "Home Page");
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