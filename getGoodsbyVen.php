<?php
include("connect.php");
$vendor = $_GET["vendor"];

try {
    $sqlSelect = "SELECT vendors.ID_Vendors, vendors.v_name, items.ID_Items, items.name 
    FROM vendors JOIN items ON vendors.ID_Vendors = items.FID_Vendor
    WHERE vendors.v_name = :vendor";
    $sth = $dbh->prepare($sqlSelect);
    $sth->bindValue(":vendor", $vendor);
    $sth->execute();
    $res = $sth->fetchAll(PDO::FETCH_NUM);

    echo "<table border='1'>";
    echo "<thead><tr><th>Vendor Name</th><th>Item Name</th></tr></thead>";
    echo "<tbody>";

    foreach ($res as $row) {
        echo "<tr><td>{$row[1]}</td><td>{$row[3]}</td></tr>";
    }

    echo "</tbody>";
    echo "</table>";
} catch(PDOException $ex) {
    echo $ex->getMessage();
}

$dbh = null;
?>
