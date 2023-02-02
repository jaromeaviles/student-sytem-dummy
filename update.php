<?php 

include_once 'connections/connection.php';

$conn = connection();

$id = $_POST['id'];
$firstName =  $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$gender = $_POST['gender'];

$stmt = $conn->prepare('UPDATE student_info SET first_name = ? , last_name = ? , email = ? , gender = ? WHERE id = ?');

$stmt->bind_param('ssssi', $firstName, $lastName, $email, $gender, $id);

$stmt->execute();

echo header('location: index.php');

?>