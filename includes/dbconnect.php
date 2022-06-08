<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "commune";

try {
    $connect = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connect->exec("set names utf8");
    }catch(PDOException $e){
    	echo "DataBase Connection failed: " . $e->getMessage();
    }
?>