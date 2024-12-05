<?php
include "config.php";
session_start();

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

    $select = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'") or die('connect failed');
    if (mysqli_num_rows($select) > 0) {
        $row = mysqli_fetch_assoc($select);
        $_SESSION['id']= $row['id'];
        header("location: home.php");
    } else {
        $message[] = 'email or password incorrect';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
    <main>
        <form action="" method="post" enctype="multipart/form-data">
            <h3>login now</h3>
            <?php
                if(isset($message)){
                    foreach($message as $message){
                        echo "
                            <div class='message'>".$message."</div>
                        ";
                    }
                }
            ?>
            <input type="email" name="email" placeholder="type your email" required>
            <input type="password" name="password" placeholder="type password" required>
            <button type="submit" name="submit">register now</button>
            <p>don't have an account? <a href="register.php">register now</a></p>
        </form>
    </main>
</body>
</html>