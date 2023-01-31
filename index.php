<?php

include_once 'connections/connection.php';

$conn = connection();

$sql = 'SELECT * FROM student_info ORDER BY id DESC';

$students = $conn->query($sql) or die($conn->error);

$row = $students->fetch_assoc();

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
    <a href="add.php">Add New</a>
    <table>
        <tr>
            <th>Last Name</th>
            <th>First Name</th>
        </tr>
        <?php do { ?>
        <tr>
            <td><?php echo $row['last_name']; ?></td>
            <td><?php echo $row['first_name']; ?></td>
        </tr>
        <?php } while ($row = $students->fetch_assoc()); ?>

    </table>
</body>
</html>