<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbName = 'online_shop';
    
    $conn = mysqli_connect($host,$user,$password,$dbName);
?>