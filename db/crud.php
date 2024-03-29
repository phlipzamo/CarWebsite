<?php
class Crud
{
    private $db;
    function __construct($conn)
    {
        $this->db = $conn;
    }
    // Model DB interation begin

    public function getMakes()
    {
        try {
            $sql = "SELECT * FROM `makes`";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt;
            return $result;
        } catch (PDOException $e) {

            $_SESSION["errorMessage"] .= $e->getMessage();
            return false;
        }
    }
    public function getMake($id)
    {
        try {
            $sql = "SELECT * FROM `makes` Where id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {

            $_SESSION["errorMessage"] .= $e->getMessage();
            return false;
        }
    }
    public function getMakeIdFromName($make)
    {
        try {
            $sql = "SELECT id FROM `makes` Where make = :make";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':make', $make);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {

            $_SESSION["errorMessage"] .= $e->getMessage();
            return false;
        }
    }
    public function insertMake($make)
    {

        try {

            $sql = "INSERT INTO makes(make) VALUES (:make)";

            $stmt = $this->db->prepare($sql);

            $stmt->bindparam(':make', $make);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            $_SESSION["errorMessage"] .= $e->getMessage();
            return false;
        }
    }
    public function updateMake($id, $make)
    {
        try {
            $sql = "UPDATE `makes` 
                SET `make`=:make,`id`=:id
                WHERE id = :id";

            $stmt = $this->db->prepare($sql);

            $stmt->bindparam(':make', $make);

            $stmt->bindparam(':id', $id);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            $_SESSION["errorMessage"] .= $e->getMessage();
            return false;
        }
    }
    public function deleteMake($id)
    {
        try {

            $sql = "DELETE FROM `makes` WHERE id = :id";

            $stmt = $this->db->prepare($sql);

            $stmt->bindparam(':id', $id);

            $stmt->execute();
            return true;
        } catch (PDOException $e) {

            $_SESSION["errorMessage"] .= $e->getMessage();
            return false;
        }
    }
    public function getModels($makeID)
    {
        try {
            $sql = "SELECT * FROM `models` WHERE make_id=:makeID";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':makeID', $makeID);
            $stmt->execute();
            $result = $stmt;
            return $result;
        } catch (PDOException $e) {

            $_SESSION["errorMessage"] .= $e->getMessage();
            return false;
        }
    }
    public function getModelAndMake()
    {
        try {
            $sql = "SELECT name, make FROM `makes` INNER JOIN `models` ON makes.id = models.make_id;";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt;
            return $result;
        } catch (PDOException $e) {

            $_SESSION["errorMessage"] .= $e->getMessage();
            return false;
        }
    }
    public function insertModel($model, $makeID)
    {

        try {

            $sql = "INSERT INTO models(make_id, name) VALUES (:makeID, :model)";

            $stmt = $this->db->prepare($sql);

            $stmt->bindparam(':makeID', $makeID);
            $stmt->bindparam(':model', $model);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            $_SESSION["errorMessage"] .= $e->getMessage();
            return false;
        }
    }
    public function getModel($id)
    {
        try {
            $sql = "SELECT * FROM `models` Where id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {

            $_SESSION["errorMessage"] .= $e->getMessage();
            return false;
        }
    }
    public function getModelId($name)
    {
        try {
            $sql = "SELECT * FROM `models` Where name = :name";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':name', $name);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {

            $_SESSION["errorMessage"] .= $e->getMessage();
            return false;
        }
    }
    public function updateModel($id, $model, $makeID)
    {
        try {
            $sql = "UPDATE `models` 
                SET `name`=:model,`make_id`=:makeID,`id`=:id
                WHERE id = :id";

            $stmt = $this->db->prepare($sql);

            $stmt->bindparam(':model', $model);

            $stmt->bindparam(':makeID', $makeID);

            $stmt->bindparam(':id', $id);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            $_SESSION["errorMessage"] .= $e->getMessage();
            return false;
        }
    }
    public function deleteModel($id)
    {
        try {

            $sql = "DELETE FROM `models` WHERE id = :id";

            $stmt = $this->db->prepare($sql);

            $stmt->bindparam(':id', $id);

            $stmt->execute();
            return true;
        } catch (PDOException $e) {

            $_SESSION["errorMessage"] .= $e->getMessage();
            return false;
        }
    }
    public function getTypes()
    {
        try {
            $sql = "SELECT * FROM `vehicle_type`";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt;
            return $result;
        } catch (PDOException $e) {

            $_SESSION["errorMessage"] .= $e->getMessage();
            return false;
        }
    }
    public function getTypeId($name)
    {
        try {
            $sql = "SELECT * FROM `vehicle_type` WHERE name = :name";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':name', $name);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {

            $_SESSION["errorMessage"] .= $e->getMessage();
            return false;
        }
    }
    public function getPowerTypes()
    {
        try {
            $sql = "SELECT * FROM `vehicle_power_types`";
            $stmt = $this->db->prepare($sql);

            $stmt->execute();
            $result = $stmt;
            return $result;
        } catch (PDOException $e) {

            $_SESSION["errorMessage"] .= $e->getMessage();
            return false;
        }
    }

    public function getPowerTypesId($name)
    {
        try {
            $sql = "SELECT * FROM `vehicle_power_types` Where name = :name";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':name', $name);
            $stmt->execute();
            $result = $stmt;
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {

            $_SESSION["errorMessage"] .= $e->getMessage();
            return false;
        }
    }

    public function insertInventory(
        $modelID,
        $year,
        $color,
        $vehicleTypeID,
        $vehiclePowerTypeID,
        $vin,
        $purchaseDate,
        $purchasePrice,
        $soldDate,
        $soldPrice,
        $addCost
    ) {

        try {

            $sql = "INSERT INTO `vehicles`(`model_id`, `year`, `vehicle_type_id`, 
                `vehicle_power_type_id`, `vin`, `dealer_purchase_date`, `dealer_purchase_price`, 
                `sold_date`, `sold_price`, `additional_cost`, `color`)  
                VALUES (:modelID, :year, :vehicleTypeID, :vehiclePowerTypeID, 
                :vin, :purchaseDate, :purchasePrice, :soldDate, :soldPrice, :addCost, :color)";

            $stmt = $this->db->prepare($sql);

            $stmt->bindparam(':modelID', $modelID);
            $stmt->bindparam(':year', $year);
            $stmt->bindparam(':color', $color);
            $stmt->bindparam(':vehicleTypeID', $vehicleTypeID);
            $stmt->bindparam(':vehiclePowerTypeID', $vehiclePowerTypeID);
            $stmt->bindparam(':vin', $vin);
            $stmt->bindparam(':purchaseDate', $purchaseDate);
            $stmt->bindparam(':purchasePrice', $purchasePrice);
            $stmt->bindparam(':soldDate', $soldDate);
            $stmt->bindparam(':soldPrice', $soldPrice);
            $stmt->bindparam(':addCost', $addCost);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            $_SESSION["errorMessage"] .= $e->getMessage();
            return false;
        }
    }
    public function updateInventory(
        $vehicleId,
        $modelID,
        $year,
        $color,
        $vehicleTypeID,
        $vehiclePowerTypeID,
        $vin,
        $purchaseDate,
        $purchasePrice,
        $soldDate,
        $soldPrice,
        $addCost
    ) {

        try {
            $sql = "UPDATE `vehicles`
                SET `model_id`=:modelID, `year`= :year, `vehicle_type_id`=:vehicleTypeID, 
                `vehicle_power_type_id`=:vehiclePowerTypeID, `vin`=:vin, `dealer_purchase_date`=:purchaseDate,
                `dealer_purchase_price`= :purchasePrice, `sold_date`= :soldDate, `sold_price`= :soldPrice, 
                `additional_cost`=:addCost, `color`=:color
                WHERE vehicle_id = :id";

            $stmt = $this->db->prepare($sql);

            $stmt->bindparam(':id', $vehicleId);
            $stmt->bindparam(':modelID', $modelID);
            $stmt->bindparam(':year', $year);
            $stmt->bindparam(':color', $color);
            $stmt->bindparam(':vehicleTypeID', $vehicleTypeID);
            $stmt->bindparam(':vehiclePowerTypeID', $vehiclePowerTypeID);
            $stmt->bindparam(':vin', $vin);
            $stmt->bindparam(':purchaseDate', $purchaseDate);
            $stmt->bindparam(':purchasePrice', $purchasePrice);
            $stmt->bindparam(':soldDate', $soldDate);
            $stmt->bindparam(':soldPrice', $soldPrice);
            $stmt->bindparam(':addCost', $addCost);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            $_SESSION["errorMessage"] .= $e->getMessage();
            return false;
        }
    }
    public function getInventory()
    {
        try {
            $sql = "SELECT `vehicles`.`vehicle_id`, `vehicles`.`year`, `vehicles`.`vin`, `vehicles`.`dealer_purchase_date`, 
                `vehicles`.`dealer_purchase_price`, `vehicles`.`sold_date`, `vehicles`.`sold_price`, `vehicles`.`additional_cost`, 
                `vehicles`.`color`, `makes`.`make`, `mod`.`name` AS `model`, `vpt`.`name` AS `power`, `vt`.`name` AS `type` 
                FROM `vehicles` INNER JOIN `models` AS `mod` ON `mod`.`id` = vehicles.model_id 
                INNER JOIN `makes` ON mod.make_id = `makes`.`id` 
                INNER JOIN vehicle_type AS vt on vt.id = vehicles.vehicle_type_id 
                INNER JOIN vehicle_power_types AS vpt ON vpt.id = vehicles.vehicle_power_type_id;";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt;
            return $result;
        } catch (PDOException $e) {

            $_SESSION["errorMessage"] .= $e->getMessage();
            return false;
        }
    }
    public function getInventoryItem($id)
    {
        try {
            $sql = "SELECT `vehicles`.`vehicle_id`, `vehicles`.`year`, `vehicles`.`vin`, `vehicles`.`dealer_purchase_date`, 
                `vehicles`.`dealer_purchase_price`, `vehicles`.`sold_date`, `vehicles`.`sold_price`, `vehicles`.`additional_cost`, 
                `vehicles`.`color`, `makes`.`make`, `mod`.`name` AS `model`, `vpt`.`name` AS `power`, `vt`.`name` AS `type` 
                FROM `vehicles` INNER JOIN `models` AS `mod` ON `mod`.`id` = vehicles.model_id 
                INNER JOIN `makes` ON mod.make_id = `makes`.`id` 
                INNER JOIN vehicle_type AS vt on vt.id = vehicles.vehicle_type_id 
                INNER JOIN vehicle_power_types AS vpt ON vpt.id = vehicles.vehicle_power_type_id
                WHERE `vehicles`.`vehicle_id` = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {

            $_SESSION["errorMessage"] .= $e->getMessage();
            return false;
        }
    }
    public function deleteInventory($id)
    {
        try {

            $sql = "DELETE FROM `vehicles` WHERE `vehicles`.`vehicle_id` = :id";

            $stmt = $this->db->prepare($sql);

            $stmt->bindparam(':id', $id);

            $stmt->execute();
            return true;
        } catch (PDOException $e) {

            $_SESSION["errorMessage"] .= $e->getMessage();
            return false;
        }
    }
}
