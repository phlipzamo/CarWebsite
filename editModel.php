<?php 
    $title ="Edit Model";
    require_once 'includes/header.php'; 
    require_once 'includes/navbar.php'; 
    require_once 'db/conn.php';
    $makes = $crud->getMakes();
    if (isset($_GET['id'])){
        $model = $crud->getModel($_GET['id']);
    }
    else{
        echo "<h1> Something went wrong</h1>";
    }
    require_once 'db/conn.php';
    if(isset($_POST["submit"]))
    {
      
        $id = $_POST['id'];
        $makeId=$crud->getMakeIdFromName($_POST['make']);
        $model=$_POST['model'];
        $isSuccess=$crud->updateModel($id,$model, $makeId[0]);        
        header("Location:manageModels.php");
    }
?>
<form style="width: 60%;" method = "post" action= "<?php echo htmlentities($_SERVER['PHP_SELF']);?>" class="row g-3">
<input type="hidden" name = "id" value = "<?php echo $_GET['id']?>"></label>
<div class="col-md-4">
    <label for="exampleFormControlSelect1">Make</label>
    <select class="form-control" id="exampleFormControlSelect1" name="make" required>
        <?php while($r = $makes->fetch(PDO::FETCH_ASSOC)) {?>
            <?php 
                    $option = "<option";
                    if($model['make_id']==$r["id"]){
                        $option.=" selected";
                    }
                    $option.=">".$r["make"]."</option>";
                    echo $option;
                     ?>
        <?php } ?>  
    </select>
</div>
<div class="col-md-8"></div>
<div class="col-md-4">
<label for="validationServerMake" class="form-label">Model</label>
<div class="input-group has-validation">
  <input type="text" class="form-control" id="validationServerMake" name="model" value = "<?php echo $model["name"]?>" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required>
</div>
</div>
<div class="col-12">
<button class="btn btn-default" type="submit" name="submit" >Submit form</button>
</div>
</form>
<?php 
    require_once 'includes/footer.php'; 
?>