<?php

if (!isset($_SESSION)) {
    session_start();
}

// Checks if logged in

if (!isset($_SESSION['userLogin'])) {
    echo header('location: index.php');
}

include_once 'connections/connection.php';

$conn = connection();

$id = $_GET['id'];

$sql = "SELECT * FROM student_info WHERE id = '$id'";

$result = $conn->query($sql) or die($conn->error);

$row = $result->fetch_assoc();

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
    
    <h1><?php echo $row['last_name'] . ", " . $row['first_name']; ?> </h1>

    <p>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>
    <br />
    <p>I Am <?php echo $row['gender']; ?></p>
    <br />
    <a href="index.php">Back to Home</a>
    <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>

    <form action="delete.php" method="post">
        <input type="hidden" name="id" id="id" value="<?= $row['id']; ?>">
        <button name="delete">Delete</button>
    </form>
</body>
</html>