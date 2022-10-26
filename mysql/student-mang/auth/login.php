<?php

session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: welcome.php");
    exit;
}

require_once("../config/db_connection.php");

$username = $password = "";
$username_error = $password_error = $login_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_error = "Please enter a username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_error = "Please enter a password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Login Process
    if (empty($username_error) && empty($password_error)) {

        $sql = "SELECT id, username, password FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            $param_username = $username;

            if (mysqli_stmt_execute($stmt)) {
                // store result
                mysqli_stmt_store_result($stmt);

                // check username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {

                    // Start login attempt
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {


                        if (password_verify($password, $hashed_password)) {

                            // Password is correct, then start a new session;
                            session_start();

                            // Store data in sessssion variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Redirect to login page
                            header("location: ../welcome.php");
                        } else {
                            $login_error = "Invalid username or password.";
                        }
                    }
                } else {
                    $login_error = "Invalid username or password.";
                }

                // Close statement
                mysqli_stmt_close($stmt);
            }
        } else {
            echo "Oops! Something wrong. Please try again later.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management | Login</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <style>
    body {
        font: 14px sans-serif;
    }

    .wrapper {
        width: 25%;
        padding: 20px;
    }
    </style>
</head>

<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill this from to login an account.</p>

        <?php
        if (!empty($login_error)) {
            echo '<div class="alert alert-danger">' . $login_error . '</div>';
        }
        ?>

        <form action="<?php $_PHP_SELF ?>" method="POST">

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control <?php echo (!empty($username_error)) ? 'is-invalid' : '' ?>"
                    id="username" name="username" value="<?php echo $username ?>" autofocus required>
                <span class="invalid-feedback"><?php echo $username_error ?></span>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control <?php echo (!empty($password_error)) ? 'is-invalid' : '' ?>"
                    id="password" name="password" required>
                <span class="invalid-feedback"><?php echo $password_error ?></span>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Login</button>
                <button type="reset" class="btn btn-secondary ml-2">Reset</button>
                <a href="../index.php" class="btn btn-info">Home</a>
            </div>

            <p>You don't have an account? <a href="register.php">Register here</a>.</p>
        </form>
    </div>
</body>

</html>