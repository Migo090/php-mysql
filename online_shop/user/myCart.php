<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my cart</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="shortcut icon" href="../logo.jpg" type="image/x-icon">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/dc4acf190f.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <h2>My Cart</h2>
        <a href="shopping.php">
            <h3>Go Shopping</h3>
        </a>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include '../connection.php';
                    $result = mysqli_query($conn,'SELECT * FROM cart');
                    while( $row = mysqli_fetch_assoc($result)){
                        echo "
                            <tr>
                                <td>". $row['name'] . "</td>
                                <td>". $row['price'] . "$</td>
                                <td>
                                    <i class='fa-solid fa-trash-can delete' onclick='delCart(" . $row['id'] . ")'></i>
                                </td>
                            </tr>
                        ";
                    }
                ?>
            </tbody>
        </table>
    </main>
    <script src="../script.js"></script>
</body>
</html>