<?php
$title = "Manage Inventory";
require_once 'includes/header.php';
require_once 'includes/navbar.php';
require_once 'db/conn.php';
$results = $crud->getInventory();
?>

<div style="height: 350px; width:100%; overflow: auto">
    <table class="table table-striped-columns" style="height: 400px">
        <thead>
            <tr>
                <th>Edit</th>
                <th>Delete</th>
                <th>Make</th>
                <th>Model</th>
                <th>Color</th>
                <th>Type</th>
                <th>Power</th>
                <th>Purchase Date</th>
                <th>Purchase Price</th>
                <th>Sold Date</th>
                <th>Sold Price</th>
                <th>Additional Cost</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td> <a class="btn btn-default" href="editInventory.php?id=<?php echo $r["vehicle_id"]; ?>"> Edit </a></td>
                    <td> <a class="btn btn-default" href="deleteInventory.php?id=<?php echo $r["vehicle_id"]; ?>"> Delete </a></td>
                    <td> <?php echo $r["make"] ?></td>
                    <td> <?php echo $r["model"]; ?></td>
                    <td> <?php echo $r["color"]; ?></td>
                    <td> <?php echo $r["type"]; ?></td>
                    <td> <?php echo $r["power"] ?></td>
                    <td> <?php echo $r["dealer_purchase_date"]; ?></td>
                    <td> <?php echo $r["dealer_purchase_price"]; ?></td>
                    <td> <?php echo $r["sold_date"]; ?></td>
                    <td> <?php echo $r["sold_price"]; ?></td>
                    <td> <?php echo $r["additional_cost"]; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php
require_once 'includes/footer.php';
?>