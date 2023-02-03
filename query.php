<?php

if (!isset($_SESSION)) {
    session_start();
}

include_once 'connections/connection.php';

$conn = connection();

$query =  $_GET['query'];

$sql = "SELECT * FROM student_info WHERE first_name LIKE '%$query%' || last_name LIKE '%$query%' ORDER BY id DESC";

$students = $conn->query($sql) or die($conn->error);

$row = $students->fetch_assoc();

$resultsFound = $students->num_rows;

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
    
    <h1>STUDENT INFORMATION SYSTEM </h1>
    <?php if (isset($_SESSION['userLogin'])) {?>
        <h2>Welcome <?php echo $_SESSION['userLogin'] ?></h2>
    <?php } else { ?>
        <h2>Welcome Guest</h2>
    <?php }?>

    <?php if(isset($_SESSION['userLogin'])) {?>
    <a href="logout.php">Logout</a>
    <?php } else { ?>
        <a href="login.php">Login</a>
    <?php }?>

    <!-- Displays only if user loggedin -->
    <?php if (isset($_SESSION['userLogin'])) { ?>
    <a href="add.php">Add New</a>
    <?php } ?>

    <!-- Search -->
    <br />
    <br />
    <form action="" method="get">
        <input type="text" placeholder="Search" name="query">
        <input type="submit" value="search">
    </form>

    <!-- Checks if there are results -->
    <?php if ($resultsFound > 0 ) { ?>

    <table>
        <tr>
            <th></th>
            <th>Last Name</th>
            <th>First Name</th>
        </tr>
        <?php do { ?>
        <tr>
            <?php if (isset($_SESSION['userLogin'])) {?>
            <td><a href="details.php?id=<?php echo $row['id'];?>">View</td>
            <?php } else { ?>
            <td><a href="#">View</td>
            <?php } ?>
            <td><?php echo $row['last_name']; ?></td>
            <td><?php echo $row['first_name']; ?></td>
        </tr>
        <?php } while ($row = $students->fetch_assoc()); ?>

    </table>

    <?php } else { ?>
        <p>No Results!</p>
    <?php } ?>
</body>
</html>