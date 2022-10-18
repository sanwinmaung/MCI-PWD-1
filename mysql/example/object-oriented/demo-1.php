<?php

// MySQLi Object-Oriented Style
// localhost = 127.0.0.1;
$servername = "localhost"; // servername - 168.22.33.201:3306 (or) https://example.com:3306
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn === false) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully!";

$conn->close();