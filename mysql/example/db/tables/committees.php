<?php

require_once("../db_procedural_connection.php");

$sql = "CREATE TABLE committees (
    committee_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100)
)";

if (mysqli_query($conn, $sql)) {
    echo "Table created successfully";
} else {
    echo "Error creating table - " . mysqli_connect_error();
}

mysqli_close($conn);