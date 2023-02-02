<?php

if (!isset($_SESSION)) {
    session_start();
}

// Checks if logged in

if (!$_SESSION['access']) {
    echo header('location: index.php');
}

include_once 'connections/connection.php';

$conn = connection();

$id = $_GET['id'];

$sql = "SELECT * FROM student_info WHERE id = " . $id;

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

<h1>Student Information System</h1>
    
    <form action="update.php" method="post">
        <br />
        <input type="hidden" name="id" id="id" value="<?php echo $row['id']?>">

        <label>First Name</label> <br />
        <input type="text" name="firstName" id="firstName" value="<?php echo $row['first_name']?>">
        <br />
        <br />
        <label>Last Name</label> <br />
        <input type="text" name="lastName" id="lastName" value="<?php echo $row['last_name']?>">
        <br />
        <br />
        <label>Email</label> <br />
        <input type="email" name="email" id="email" value="<?php echo $row['email']?>">
        <br />
        <br />
        <label>Gender</label> <br />
        <select name="gender">
            <option value="Male" <?php echo ($row['gender'] == 'Male') ? 'selected' : ''; ?>> Male </option>
            <option value="Female" <?php echo ($row['gender'] == 'Female') ? 'selected' : ''; ?>> Female </option>
        </select>
        <br />
        <br />
        <button name="update">Update</button>
    </form>
</body>
</html>
