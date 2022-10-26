<?php

session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
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
        <h1 class="mt-3">Hi, <b><?php echo ucfirst($_SESSION["username"]) ?>.</b> Welcome your dashboard area!!!</h1>

        <p>
            <a href="auth/logout.php" class="btn btn-danger">Logout</a>
        </p>
    </div>
</body>

</html>