<?php
include "../connection.php";

$id = null;
$editproduct = ['name' => '', 'price' => '', 'img' => ''];

if (isset($_GET['id'])) {
    global $id ;
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM products WHERE id = $id");
    $editproduct = mysqli_fetch_assoc($query);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update products</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="shortcut icon" href="../logo.jpg" type="image/x-icon">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/dc4acf190f.js" crossorigin="anonymous"></script>
</head>
<body>
    <main>
        <header>
            <h2>Glitch shop</h2>
            <div class="img">
                <img src="../logo.jpg" alt="">
            </div>
        </header>
        <form action="up.php" method="post" enctype="multipart/form-data">
            <input type="text" name="id" value="<?php echo $editproduct['id'] ?>" readonly hidden>
            <input type="text" name="name" placeholder="type product name" required value="<?php echo $editproduct['name'] ?>">
            <input type="number" name="price" placeholder="type product price" required value="<?php echo $editproduct['price'] ?>">
            <input type="file" name="file" id="file" hidden" value="<?php echo $editproduct['img'] ?>">
            <label for="file">
                update image
                <i id="check-icon" class="fa-solid fa-check"></i>
            </label>
            <button type="submit" name="upload">update</button>
        </form>
        <a href="products.php" class="all-products">show all products</a>
    </main>
    <footer>
        <p><i class="fa-solid fa-cogs"></i> Created by Glitch</p>
    </footer>
    <script src="../script.js"></script>
</body>
</html>