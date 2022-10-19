<?php

require_once("../db/db_procedural_connection.php");

$sql = "SELECT * FROM students WHERE email='kyawkyaw@gmail.com'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    $sql = "UPDATE students SET name='Aung Kyaw', father_name='U Myo Aung' WHERE email='kyawkyaw@gmail.com'";

    mysqli_query($conn, $sql);

    echo "Data updated successfully";
} else {
    echo "No results data for update!";
}

mysqli_close($conn);