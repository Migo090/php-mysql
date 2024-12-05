<?php
    //-----------------Delete Function---------------------
    if (isset($_GET['action']) && $_GET['action'] == 'del' && isset($_GET['id'])) {

        $id = $_GET['id'];

        // Connect to the database
        include "connection.php";

        // Delete the user with the given id
        $delquery = "DELETE FROM users WHERE id = $id";
        $delresult = mysqli_query($conn, $delquery);
        if ($delresult){
            header("Location: home.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="user.png" type="image/x-icon">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/dc4acf190f.js" crossorigin="anonymous"></script>
</head>
<body>
    <main>
        <header>
            <h2>All Users</h2>
            <a href="add.php">
                <i class="fa-solid fa-user-plus"></i>
            </a>
        </header>
        <div class="table">
            <table>
                <th>ID</th>
                <th>Name</th>
                <th>email</th>
                <th>phone</th>
                <th>password</th>
                <th>action</th>
                <?php
                    // connecting to database
                    include "connection.php";

                    //"""import data""" from database
                    $import_query = "SELECT * FROM users";
                    $import_result = mysqli_query($conn,$import_query);

                    if($import_result){
                        while($row = mysqli_fetch_assoc($import_result)){
                            echo "<tr><td>" . $row['id'] . "</td><td>" 
                            . $row['name'] . "</td><td>" 
                            . $row['email'] . "</td><td>" 
                            . $row['phone'] . "</td><td>" 
                            . $row['password'] . "</td><td>"
                            . "<i class='fa-solid fa-trash-can delete' onclick='delButton(" . $row['id'] . ")'></i>"
                            . "<i class='fa-regular fa-pen-to-square edit' onclick='editButton(" . $row['id'] . ")'></i>" 
                            . "</td></tr>";
                        };
                    }
                ?>
            </table>
        </div>
    </main>
    <script src="script.js"></script>
</body>
</html>