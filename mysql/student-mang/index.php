<?php

session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: welcome.php");
    exit;
}

require_once("config/db_connection.php");

// If you already created database, please set $db_exists = true.
$db_exists = true;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management | Welcome</title>

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
            <a href="auth/login.php" class="btn btn-success">Login</a>
            <a href="auth/register.php" class="btn btn-info">Sign Up</a>

            <?php
            // if (!$db_exists) {
            echo '<a href="config/create-database.php" class="btn btn-warning">Create Database</a>';
            // }
            ?>
        </p>
    </div>
</body>

</html>