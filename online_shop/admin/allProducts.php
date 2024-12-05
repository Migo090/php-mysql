<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>products</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="shortcut icon" href="../logo.jpg" type="image/x-icon">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/dc4acf190f.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <h2>All products</h2>
        <a href="addProducts.php">
            <i class="fa-solid fa-plus add-product"></i>
        </a>
    </header>
    <div class="products">
        <?php
            include "../connection.php";
            $result = mysqli_query($conn,'SELECT * FROM products;');
            while($row = mysqli_fetch_assoc($result)){
                echo '
                    <div class="card">
                        <img src="' . $row["img"] . '">
                        <div class="info">
                            <h4>' . $row["name"] . '</h4>
                            <p>' . $row["price"] . '$</p>
                        </div>
                        <div class="tools">
                            <i class="fa-solid fa-trash-can delete" onclick="delButton(' . $row['id'] . ')"></i>
                            <i class="fa-regular fa-pen-to-square edit" onclick="editButton(' . $row['id'] . ')"></i>
                        </div>
                    </div>        
                ';
            }
        ?>
    </div>
    <footer>
        <p><i class="fa-solid fa-cogs"></i> Created by Glitch</p>
    </footer>
    <script src="../script.js"></script>
</body>
</html>  