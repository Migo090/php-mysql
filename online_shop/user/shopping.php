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
        <h2>shopping</h2>
        <a href="myCart.php">
            <i class="fa-solid fa-cart-shopping cart"></i>
        </a>
    </header>
    <div class="products">
        <?php
            include "../connection.php";
            $result = mysqli_query($conn,'SELECT * FROM products;');
            while($row = mysqli_fetch_assoc($result)){
                echo '
                    <div class="card shop-card">
                        <img src="' . $row["img"] . '">
                        <div class="info">
                            <h4>' . $row["name"] . '</h4>
                            <p>' . $row["price"] . '$</p>
                        </div>
                        <div class="tools" onclick="addCart('. $row['id'] .')">
                            <p> Add to cart</p>
                            <i class="fa-solid fa-cart-shopping cart"></i>
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