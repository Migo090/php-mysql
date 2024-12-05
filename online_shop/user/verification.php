<?php
include "../connection.php";

$id = null;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM products WHERE id = $id");
    $addedproduct = mysqli_fetch_assoc($query);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>verifiction</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="shortcut icon" href="../logo.jpg" type="image/x-icon">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/dc4acf190f.js" crossorigin="anonymous"></script>
</head>
<body>
    <main>
        <header>
            <h2>are you sure to add this product?</h2>
        </header>
        <br>
        <form action="insertCart.php" method="post">
            <input type="text" name="id" value="<?php echo $addedproduct['id'] ?>" readonly>
            <input type="text" name="name" value="<?php echo $addedproduct['name'] ?>" readonly>
            <input type="text" name="price" value="<?php echo $addedproduct['price'] ?>" readonly>
            <button type="submit" name="add">add to cart</button>
        </form>
    </main>
</body>
</html>