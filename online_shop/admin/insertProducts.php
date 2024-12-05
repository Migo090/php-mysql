<?php
    include "../connection.php";
    if(isset($_POST["upload"])){
        $name = $_POST["name"];
        $price = $_POST["price"];
        $img = $_FILES["file"];
        $img_location = $_FILES['file']['tmp_name'];
        $img_name = $_FILES['file']['name'];
        $img_up = '../images/' . $img_name;
        //send to database
        $query = "INSERT INTO products (name,price,img) VALUES('$name','$price','$img_up')";
        mysqli_query($conn,$query);

        if(move_uploaded_file($img_location,'../images/'. $img_name)){
            echo 'done';
        }else{
            echo 'bl7';
        }
        header("location: allProducts.php ");
        exit();
    }
?>