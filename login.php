<?php 
    $title ="Login";
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';
    $validity = "";
    if($_SERVER['REQUEST_METHOD']=='POST'){

        if(isset($_POST["btnLogin"])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $results = $userClass->getUser($username, $password);
            if(!$results){
    
                $validity = "is-invalid";
            }
            else{
                $validity = "";
                $_SESSION['username']=$username;
                $_SESSION['id']= $results['user_id'];
                
                header("Location: homePage.php");
            }
        }
        else if(isset($_POST["btnRegister"])) {
            header("Location: register.php");
        }  
    }
    else{
        session_destroy();
        session_unset();
        session_start();
    }
?>

<<div class="sidenav">
         <div class="login-main-text">
            <h2>Vehicle Inventory Managment System (VIMS)<br>Login Page</h2>
            <p>Login or register from here to access.</p>
         </div>
      </div>
      <div class="main">
         <div class="col-md-4 col-sm-15">
            <div class="login-form">
                <form method= "post" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>">
                  <div class="form-group">
                  <label for="validationServer02" class="form-label">User Name</label>
                  <input type="text" class="form-control <?php echo $validity?>" id="validationServer02" placeholder="User Name" name= "username" >
                  
                   
                  </div>
                  <div class="form-group">
                  <label for="validationServer01" class="form-label">Password</label>
                  <input type="password" class="form-control <?php echo $validity?>" id="validationServer01" placeholder="Password" name= "password" >
                  </div>
                  <button type="submit" class="btn btn-black" name="btnLogin">Login</button>
                  <button type="submit" class="btn btn-secondary" name="btnRegister">Register</button>
               </form>
            </div>
         </div>
      </div>
<?php 
    require_once 'includes/footer.php'; 
?>