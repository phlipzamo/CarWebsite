<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">VIMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="manageUsers.php">Manage Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="manageVehicles.php">Manage Vehicles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="manageInventory.php">Manage Inventory</a>
                    </li>
                    <li class="nav-item">
                       
                        <a class="nav-link active" aria-current="page" href="login.php">Logout</a>
                       
                    </li>
                </ul>
            </div>
        </div>
</nav>
<?php
    if(isset($_SESSION['id'])){
?>
<div class="text-center">
<H1>"Welcome <?php echo $_SESSION['username']?>"</H1>
</div>

<?php
    }
?>