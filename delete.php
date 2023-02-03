<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['userLogin'])) {
    echo header('location: index.php');
}


include_once 'connections/connection.php';

$conn = connection();


$id =  $_POST['id'];

$sql = 'DELETE FROM student_info WHERE id = ' . $id;

$conn->query($sql) or die($conn->error);

echo header('location: index.php');

?>