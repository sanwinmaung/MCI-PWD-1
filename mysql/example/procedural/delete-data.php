<?php

require_once("../db/db_procedural_connection.php");

// Delete all sql
// $sql = "DELETE FROM students";

// Delete specific row (or) record
// $sql = "DELETE FROM students where id = 7";

// Delete limit row (or) record
$sql = "DELETE FROM students ORDER BY id DESC LIMIT 1";

if (mysqli_query($conn, $sql)) {
    echo "Data deleted successfully";
} else {
    echo "Error deleting row - " . mysqli_connect_error();
}

mysqli_close($conn);