<?php
session_start();
$servername = "localhost";
$dbname = "id9838746_kujaku";
$username = "id9838746_kujaku";
$password = "*******";

try {
    $bdd = new PDO("mysql:host=$servername;dbname=$dbname;charset=UTF8", $username, $password);
    // set the PDO error mode to exception
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {echo "Connection failed: " . $e->getMessage();
}
?>
