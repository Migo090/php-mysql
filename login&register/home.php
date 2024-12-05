<?php
include "config.php";
session_start();
$user_id = $_SESSION['id'];

if(!isset($user_id)){
    header("location: login.php");
}

if(isset($_GET['logout'])){
    unset($user_id);
    session_destroy();
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
    <main>
        <div class="profile">
            <?php
                $select = mysqli_query($conn,"SELECT * FROM users WHERE id='$user_id'") or die('query failed');
                if(mysqli_num_rows($select) > 0){
                    $fetch = mysqli_fetch_assoc($select);
                }
                if($fetch['img'] == ''){
                    echo "<div class='logo'><img src='images/default.png'></div>";
                }else{
                    echo "<div class='logo'><img src='uploaded_imgs/".$fetch['img']."'></div>";
                }
                echo "<h3>". $fetch['name'] ."</h3>";
                echo "
                <div>
                <a href='update_profile.php' class='update'>update profile</a>
                <a href='home.php?logout=".$user_id."' class='logout'>logout</a>
                </div>
                ";
            ?>
        </div>
    </main>
</body>
</html>