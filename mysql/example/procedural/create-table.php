<?php

require_once("../db/db_procedural_connection.php");

echo mysqli_get_host_info($conn);

$sql = "CREATE TABLE persons (
id AUTO_INCREMENT,
firstname,
lastname,
email
)";

if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database - " . mysqli_error();
}

mysqli_close($conn);

/*
    id - none
    firstname - 
    lastname - 
*/