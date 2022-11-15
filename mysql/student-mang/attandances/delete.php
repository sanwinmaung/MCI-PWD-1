<?php

session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../auth/login.php");
    exit;
}

require_once("../config/db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $sql = "DELETE FROM attandances WHERE id=$id";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    header("location: index.php");
} else {
    header("location: index.php");
    exit;
}