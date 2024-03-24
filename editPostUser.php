<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
<H1>
    <?php 
    require_once 'db/conn.php';
    if(isset($_POST["submit"]))
    {
        $fname=$_POST['firstName'];
        $lname=$_POST['lastName'];
        $email=$_POST['email'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        if(isset($_POST['isAdmin']))
        {
            $isAdmin =true;
        }
        else{
            $isAdmin = 0;
        }
        $userId = $_POST['userId'];

        $isSuccess=$userClass->updateUser($username,$lname,$fname,$email,$password,$isAdmin,$userId);  
   
        //if($isSuccess){
   ?>
   <div class="alert alert-success" role="alert">
        <?php echo $isAdmin?>
    </div>
    <form method = "post" action= "manageUsers.php" >
    <div class="col-12">
    <button class="btn btn-primary" type="submit" name="submit" >back</button>
    </div>
   <?php         
       // }
       // else{   
      //      header("Location: newUser.php");
       // }
  }
   
    ?>
    </H1>
</body>
</html>