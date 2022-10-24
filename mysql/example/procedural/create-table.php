<?php

require_once("../db/db_procedural_connection.php");

// echo mysqli_get_host_info($conn);

$sql = "CREATE TABLE students (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    father_name VARCHAR(255) NOT NULL,
    mobile VARCHAR(14) NOT NULL,
    date_of_birth DATE NULL,
    email VARCHAR(255) NULL UNIQUE,
    address VARCHAR(255) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (mysqli_query($conn, $sql)) {
    echo "Table created successfully";
} else {
    echo "Error creating table - " . mysqli_connect_error();
}

mysqli_close($conn);