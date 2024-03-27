<?php 
    $title ="Manage Users";
    require_once 'includes/header.php'; 
    require_once 'includes/navbar.php'; 
    require_once 'db/conn.php';
    $results = $crud->getMakes();
?>

<div style="margin-right:22%; height: 350px; width:50%; overflow: auto">
<table class="table" style="height: 400px">
    <thead >
        <tr>
            <th>Edit</th>
            <th>Delete</th>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
        <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
        <tr>
            <td> <a  class= "btn btn-default" href="editMake.php?id=<?php echo $r["id"]; ?>">Edit </a></td>
            <td> <a  class= "btn btn-default" href="deleteMake.php?id=<?php echo $r["id"]; ?>">Delete </a></td>
            <td style="font-size: larger;"> <?php echo $r["make"]; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
</div>

<?php 
    require_once 'includes/footer.php'; 
?>