<?php
$title = "Manage models";
require_once 'includes/header.php';
require_once 'includes/navbar.php';
require_once 'db/conn.php';
$makes = $crud->getMakes();
if (isset($_POST["btnMakeUpdate"])) {
    $makeID = $crud->getMakeIdFromName($_POST['make']);
    $models = $crud->getModels($makeID[0]);
}
?>
<form style="width: 90%;" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
    <div class="col" style="margin-left: 25%;">
        <div class="row">
            <div class="col-md-3">
                <label for="exampleFormControlSelect1">Make</label>
                <select class="form-control" id="exampleFormControlSelect1" name="make" value="<?php echo $_POST['make']; ?>" required>
                    <?php while ($r = $makes->fetch(PDO::FETCH_ASSOC)) { ?>

                        <?php
                        $option = "<option";
                        if ($_POST['make'] == $r["make"]) {
                            $option .= " selected";
                        }
                        $option .= ">" . $r["make"] . "</option>";
                        echo $option;
                        ?>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-3">
                <button class="btn btn-default" type="submit" name="btnMakeUpdate">Update</button>
            </div>
        </div>
        <div style="margin-right:22%; height: 290px; width:50%; overflow: auto">
            <table class="table" style="height: 370px">
                <thead>
                    <tr>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Model Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($r = $models->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                            <td> <a class="btn btn-default" href="editModel.php?id=<?php echo $r["id"]; ?>">Edit </a></td>
                            <td> <a class="btn btn-default" href="deleteModel.php?id=<?php echo $r["id"]; ?>">Delete </a></td>
                            <td style="font-size: larger;"> <?php echo $r["name"]; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</form>

<?php
require_once 'includes/footer.php';
?>