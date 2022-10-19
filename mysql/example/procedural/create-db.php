<?php

$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);
if ($conn === false) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE demo_three";

if (mysqli_query($conn, $sql)) {

    echo "Database created successfully";
} else {
    echo "Error creating database - " . mysqli_connect_error();
}

mysqli_close($conn);