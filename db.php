<?php

$servername = "127.0.0.1";
$username = "root";
$dbName="upload";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch (PDOException $exception){
    echo "Fail to connect, $exception";
}








 ?>
