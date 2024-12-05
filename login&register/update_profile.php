<?php
include "config.php";
session_start();
$user_id = $_SESSION['id'];

if (isset($_POST['submit'])) {
    $new_name = mysqli_real_escape_string($conn, $_POST['new-name']);
    $new_email = mysqli_real_escape_string($conn, $_POST['new-email']);

    mysqli_query($conn, "UPDATE users SET name='$new_name' 
    , email ='$new_email'") or die('query failed');

    $old_pass = $_POST['old-pass'];
    $user_old_pass = mysqli_real_escape_string($conn, md5($_POST['user-old-pass']));
    $new_pass = mysqli_real_escape_string($conn, md5($_POST['new-pass']));
    $confirm_new_pass = mysqli_real_escape_string($conn, md5($_POST['confirm-new-pass']));

    if(!empty($user_old_pass) || !empty($new_pass) || !empty($confirm_new_pass)){
        if($old_pass != $user_old_pass){
            $message[] = 'password incorrect';
        }elseif($new_pass != $confirm_new_pass){
            $message[]='confirm password not match';
        }else{
            mysqli_query($conn, "UPDATE users SET password='$new_pass' 
            WHERE id='$user_id'") or die('query failed');
            $message[] = 'password updated successfully';
        }
    }

    $image = $_FILES['new-file']['name'];
    $image_size = $_FILES['new-file']['size'];
    $image_tmp_name = $_FILES['new-file']['tmp_name'];
    $image_folder = 'uploaded_imgs/' . $image;

    if(!empty($image)){
        if ($image_size > 2000000) {
            $message[] = 'Image is too large';
        }else{
            $image_query= mysqli_query($conn, "UPDATE users SET img='$image' 
                            WHERE id='$user_id'") or die('query failed');

            if ($image_query) {
                move_uploaded_file($image_tmp_name, $image_folder);
                $message[] = 'Registered successfully';
            } else {
                $message[] = 'Registration failed';
            }
            $message[] = 'image updated successfully';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
    <main>
        <div class="update-profile">
            <?php
                $select = mysqli_query($conn,"SELECT * FROM users WHERE id='$user_id'") or die('query failed');
                if(mysqli_num_rows($select) > 0){
                    $fetch = mysqli_fetch_assoc($select);
                }
                if($fetch['img'] == ''){
                    echo "<img src='images/default.png'>";
                }else{
                    echo "<img src='uploaded_imgs/".$fetch['img']."'>";
                }

                if(isset($message)){
                    foreach($message as $message){
                        echo "
                            <div class='message'>".$message."</div>
                        ";
                    }
                }
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="input-box">
                    <input type="text" name="new-name" placeholder="type your name" required value="<?php echo $fetch['name']; ?>">
                    <input type="email" name="new-email" placeholder="type your email" required value="<?php echo $fetch['email']; ?>">
                    <input type="file" name="new-file" accept="image/jpg, image/jpeg, image/png">
                </div>
                <div class="input-box">
                    <input type="password" name="old-pass" required value="<?php echo $fetch['password']; ?>" hidden>
                    <input type="password" name="user-old-pass" placeholder="type previous password">
                    <input type="password" name="new-pass" placeholder="type new password">
                    <input type="password" name="confirm-new-pass" placeholder="confirm new password">
                </div>
                <button type="submit" name="submit">update</button>
                <a href="home.php">Go back</a>
            </form>
        </div>
    </main>
</body>
</html>