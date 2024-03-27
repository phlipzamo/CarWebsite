<?php 
    $title ="Manage Users";
    require_once 'includes/header.php'; 
    require_once 'includes/navbar.php'; 
    require_once 'db/conn.php';
    $results = $userClass->getUsers($_SESSION['user_id']);

?>
<div style="height: 350px; width:85%; overflow: auto">
<table class="table table-striped-columns" style="height: 400px">
    <thead >
        <tr>
            <th>Edit</th>
            <th>Delete</th>
            <th>Name</th>
            <th>User Name</th>
            <th>Email</th>
            <th>Date Registered</th>
        </tr>
    </thead>
    <tbody>
        <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
        <tr>
            <td> <a  class= "btn btn-default" href="editUser.php?userId=<?php echo $r["user_id"]; ?>"> Edit </a></td>
            <td> <a  class= "btn btn-default" href="deleteUser.php?userId=<?php echo $r["user_id"]; ?>"> Delete </a></td>
            <td> <?php echo $r["first_name"]." ".$r["last_name"]; ?></td>
            <td> <?php echo $r["user_name"]; ?></td>
            <td> <?php echo $r["email"]; ?></td>
            <td> <?php echo $r["registration_date"]; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
</div>
<?php 
    require_once 'includes/footer.php'; 
?>