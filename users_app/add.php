<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "connection.php";

//--------------GET REQUEST HANDLING---------------------
$page_title = "add user";
$button_title = "add";
$edit_user = ['name' => '', 'email' => '', 'phone' => '', 'password' => ''];
$id = null;

if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $page_title = "edit user";
    $button_title = "update";

    // Edit the user with the given id
    $edit_query = "SELECT * FROM users WHERE id = $id";
    $edit_result = mysqli_query($conn, $edit_query);
    $edit_user = ($edit_result->fetch_assoc());
}

//-----------POST METHOD HANDLING--------------
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Phone = $_POST['phone'];
    $Pass = $_POST['password'];

    if ($_POST['submit'] == "update" && $id) {
        // Update query
        $update_query = "UPDATE users SET name = '$Name', email='$Email', phone='$Phone', password='$Pass' WHERE id = $id";
        $update_result = mysqli_query($conn, $update_query);
        
        if ($update_result) {
            header("location: home.php");
            exit();
        }
    } elseif ($_POST['submit'] == "add") {
        // Insert query
        $add_query = "INSERT INTO users(name, email, phone, password) VALUES('$Name', '$Email', '$Phone', '$Pass')";
        $add_result = mysqli_query($conn, $add_query);
        
        if ($add_result) {
            header("location: home.php");
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="user.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Work+Sans:wght@200;300;400;600;700;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/dc4acf190f.js" crossorigin="anonymous"></script>
</head>
<body>
    <main>
        <header>
            <h2><?php echo $page_title; ?></h2>
            <a href="home.php">
                <i class="fa-solid fa-house"></i>
            </a>
        </header>
        <form method="post">
            <input type="text" name="name" placeholder="type your name" required value="<?php echo $edit_user['name']; ?>">
            <input type="email" name="email" placeholder="type your email" required value="<?php echo $edit_user['email']; ?>">
            <input type="tel" name="phone" pattern="^(\+20|0020|0)?1[0125][0-9]{8}$" placeholder="type your phone" required value="<?php echo $edit_user['phone']; ?>">
            <input type="password" name="password" placeholder="type your password" required value="<?php echo $edit_user['password']; ?>">
            <input type="submit" value="<?php echo $button_title; ?>" name="submit">
        </form>
    </main>
</body>
</html>