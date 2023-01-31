<?php

function connection() {

    $host = 'localhost';
    $username = 'root';
    $password = '#Sa090694123';
    $database = 'student_db';

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        echo $conn->connect_error;
    } else {
        return $conn;
    }
}


?>