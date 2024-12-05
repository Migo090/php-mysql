<?php
    include "../connection.php";
    if(isset($_POST["add"])){
        $name = $_POST["name"];
        $price = $_POST["price"];
        //send to database
        $query = "INSERT INTO cart (name,price) VALUES('$name','$price')";
        mysqli_query($conn,$query);

        header("location: myCart.php ");
        exit();
    }
?>