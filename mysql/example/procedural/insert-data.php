<?php

require_once("../db/db_procedural_connection.php");

// echo mysqli_get_host_info($conn);

$sql = "INSERT INTO students (name, father_name, mobile, date_of_birth, email, address) VALUES ('Thiha Aung', 'U Aung Aung', '09966667769', '2001-09-23', 'thihaaung@gmail.com', 'No(18), Marlar Myaing, YGN')";

if (mysqli_query($conn, $sql)) {
    echo "Data inserted successfully";
} else {
    echo "Error creating table - " . mysqli_connect_error();
}

mysqli_close($conn);