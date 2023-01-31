<?php

include_once 'connections/connection.php';

$conn = connection();

if (isset($_POST['submit'])) {
    date_default_timezone_set('Asia/Manila');
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $dateAdded = date('m/d/Y');

    $stmt = $conn->prepare("INSERT INTO `student_info`( `first_name`, `last_name`, `email`, `gender`, `added_at`) 
    VALUES (?, ?, ?, ?, ?)");

    $stmt->bind_param('sssss', $fname, $lname, $email, $gender, $dateAdded);

    $stmt->execute();

    echo header('location: index.php');
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
    
    <h1>Add Student</h1>

    <form action="" method="POST">
    
    <label for="firstname">FirstName</label>
    <input type="text" name="firstname" id="firstname">
    <br>
    <br>
    <label for="lastname">LastName</label>
    <input type="text" name="lastname" id="lastname">
    <br>
    <br>
    <label for="email">Email</label>
    <input type="email" name="email" id="email">
    <br>
    <br>
    <label for="gender">Gender</label>
    <select name="gender" id="gender">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select>
    <br>
    <br>
    <input type="submit" name="submit" value="Submit Form">

    </form>

</body>
</html>