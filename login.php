<?php

// Checks if Session already started

if (!isset($_SESSION)) {
    session_start();
}

include_once 'connections/connection.php';

$conn = connection();

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users_info WHERE username = '$username' && password = '$password'";

    $result = $conn->query($sql) or die($conn->error);

    $row = $result->fetch_assoc();

    $total = $result->num_rows;

    if ($total > 0) {
        $_SESSION['userLogin'] = $row['username'];
        $_SESSION['access'] = $row['access'];

        echo header('location: index.php');
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student System</title>

    <!-- Imports CSS -->
    <link rel="stylesheet" href="app.css">
    
</head>
<body>

    <form action="" method="post">
        <label for="username">Username</label> <br />
        <input type="text" name="username" id="username">
        <br />
        <label for="password">Password</label> <br />
        <input type="password" name="password" id="password">
        <br />
        <button name="submit">Submit</button>
    </form>
    
</body>
</html>