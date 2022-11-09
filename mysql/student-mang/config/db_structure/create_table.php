<?php

require_once("../db_connection.php");

require_once("users_table.php");
require_once("students_table.php");
require_once("attandances_table.php");

if (mysqli_multi_query($conn, $sql)) {
    $message = "Tables created successfully!";
} else {
    echo "Error creating table - " . mysqli_connect_error();
}

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management | Create Database</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <style>
    body {
        font: 14px sans-serif;
    }

    .dashboard-area {
        text-align: center;
    }
    </style>
</head>

<body>
    <div class="dashboard-area">
        <h1 class="mt-3"><?php echo $message ?></h1>

        <p>
            <a href="../../index.php" class="btn btn-primary">Home</a>
            <a href="../create-database.php" class="btn btn-success">Back</a>
        </p>
    </div>
</body>

</html>