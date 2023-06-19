<?php
try 
{
    $dsn = "mysql:host=localhost;dbname=lb_pdo_goods";
    $user = 'root';
    $pass = '';
    $dbh = new PDO($dsn, $user, $pass);
}
    catch(PDOException $ex)
    {
        echo $ex->GetMessage();
    }
