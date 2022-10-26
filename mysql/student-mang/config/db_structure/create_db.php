<?php

$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);
if ($conn === false) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE DATABASE IF NOT EXISTS student_management";
if (mysqli_query($conn, $sql)) {
    $message = "Database created successfully.";
} else {
    $message = "Error creating database - " . mysqli_connect_error();
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