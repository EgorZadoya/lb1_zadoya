<?php
include("connect.php");
$category = $_GET["category"];

try {
    $sqlSelect = "SELECT category.ID_Category, category.c_name, items.ID_Items, items.name 
    FROM category JOIN items ON category.ID_Category = items.FID_Category
    WHERE Category.c_name = :category";
    $sth = $dbh->prepare($sqlSelect);
    $sth->bindValue(":category", $category);
    $sth->execute();
    $res = $sth->fetchAll(PDO::FETCH_NUM);

    echo "<table border='1'>";
    echo "<thead><tr><th>category Name</th><th>Item Name</th></tr></thead>";
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
