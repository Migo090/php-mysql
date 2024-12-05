<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbName = 'users_app';
    
    $conn = mysqli_connect($host,$user,$password,$dbName);
?>