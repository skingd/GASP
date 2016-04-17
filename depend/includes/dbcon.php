<?php

function readDatabase(){
    
$servername = "localhost";
$username = "tps_test_read";
$password = "w8.~7DyCX]$8";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=tps_gasp", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn; 
        }
    catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }
}
?>