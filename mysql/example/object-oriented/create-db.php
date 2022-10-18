<?php

$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);
if ($conn === false) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE demo_one";

if ($conn->query($sql) === true) {
    echo "Database created successfully";
} else {
    echo "Error creating database - " . $conn->error;
}

$conn->close();