<?php 
$server = "localhost";
$user = "root";
$password = "root";
$databasename = "php_login_database";


try {
    $conn = new PDO("mysql:hots=$server;dbname=$databasename",$user,$password);
} catch (PDOException $e) {
    die('Conecction Failed : ' . $e->getMessage());
}


?>