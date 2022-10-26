<?php

session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: welcome.php");
    exit;
}
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
        <h1 class="mt-3">This is student management mini-project!</h1>

        <p>
            <a href="../index.php" class="btn btn-primary">Home</a>
            <a href="db_structure/create_db.php" class="btn btn-success">Create Database</a>
            <a href="db_structure/create_table.php" class="btn btn-info">Create Table</a>
        </p>
    </div>
</body>

</html>