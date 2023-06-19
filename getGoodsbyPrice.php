<?php
include("connect.php");

$start_price = $_GET['start_price'];
$end_price = $_GET['end_price'];

try {   
    $sql = "SELECT name, price FROM items WHERE price BETWEEN :start_price AND :end_price;";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':start_price', $start_price);
    $stmt->bindParam(':end_price', $end_price);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<table border='1'>";
    echo "<thead><tr><th>Name</th><th>Price</th></tr></thead>";
    echo "<tbody>";

    foreach($res as $row) {
        echo "<tr><td>{$row['name']}</td><td>{$row['price']}</td></tr>";
    }

    echo "</tbody>";
    echo "</table>";
} catch(PDOException $ex) {
    echo $ex->getMessage();
}

$dbh = null;
?>
