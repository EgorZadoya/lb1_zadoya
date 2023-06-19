<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goods in the store</title>
</head>
<body>
    <h2>Товари обраного виробника</h2>
    <form action="getGoodsbyVen.php" metod="get">
        <select name="vendor" id="vendor">
    <?php
    include("connect.php");

    try 
    {
         foreach($dbh->query("SELECT DISTINCT v_name FROM vendors") as $row)
        {
            echo "<option value=$row[0]>$row[0]</option>";
        }
    }
    catch(PDOException $ex)
    {
        echo $ex->GetMessage();
    }
    ?>
    </select>
        <input type="submit" value="Результат">
    </form> 
    
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------->
<h2>Товари в обраної категорії</h2>
<form action="getGoodsbyCat.php" metod="get">
        <select name="category" id="category">
    <?php
    include("connect.php");
    try 
    {
         foreach($dbh->query("SELECT DISTINCT c_name FROM category") as $row)
        {
            echo "<option value=$row[0]>$row[0]</option>";
        }
    }
    catch(PDOException $ex)
    {
        echo $ex->GetMessage();
    }
    ?>
    </select>
        <input type="submit" value="Результат">
    </form> 



<!---------------------------------------------------------------------------------------------------------------------------->

<h2>Товари в обраному ціновому діапазоні</h2>
<form action="getGoodsbyPrice.php" method="get">
    <div name="start_price" id="start_price">
        <input type='number' name='start_price' id='start_price'>
    </div>
    <div name="end_price" id="end_price">
        <input type='number' name='end_price' id='end_price'>
    </div>
        
    <input type="submit" value="Результат">
</form>
</body>
</html>

