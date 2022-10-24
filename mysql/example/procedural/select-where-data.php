<?php

require_once("../db/db_procedural_connection.php");

// $sql = "SELECT * FROM students";

// $sql = "SELECT id, name, father_name, email FROM students WHERE id < 4 AND date_of_birth < '2001-09-01'";

$sql = "SELECT id, name, father_name, email FROM students WHERE name LIKE '%john%' OR father_name LIKE '%john%'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row['id'] . ", Name: " . $row['name'] . ", " . (array_key_exists("father_name", $row) ? ("Father Name: " . $row['father_name']) : '') . "<br>";

        var_dump($row);

        echo "<br>----------------------------------<br>";
    }
} else {
    echo "No results";
}

mysqli_close($conn);