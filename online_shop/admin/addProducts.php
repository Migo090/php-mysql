<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add products</title>
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
        <form action="insertProducts.php" method="post" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="type product name" required>
            <input type="number" name="price" placeholder="type product price" required>
            <input type="file" name="file" id="file" hidden">
            <label for="file">
                choose image
                <i id="check-icon" class="fa-solid fa-check"></i>
            </label>
            <button type="submit" name="upload">upload</button>
        </form>
        <a href="allProducts.php" class="all-products">show all products</a>
    </main>
    <footer>
        <p><i class="fa-solid fa-cogs"></i> Created by Glitch</p>
    </footer>
    <script src="../script.js"></script>
</body>
</html>