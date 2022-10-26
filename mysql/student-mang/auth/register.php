<?php

session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: welcome.php");
    exit;
}

require_once("../config/db_connection.php");

$username = "";
$password = "";
$confirm_password = "";
$username_error = $password_error = $confirm_password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_error = "Please enter a username.";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
        $username_error = "Username can only contains letters, numbers and underscores.";
    } else {

        $sql = "SELECT id FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            if (mysqli_stmt_execute($stmt)) {
                // store result
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_error = "This username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }

                // Close statement
                mysqli_stmt_close($stmt);
            }
        }
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_error = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_error = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    if (empty(trim($_POST["confirm_password"]))) {
        $password_error = "Please enter a confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);

        if (empty($password_error) && ($password != $confirm_password)) {
            $confirm_password_error = "Password did not match.";
        }
    }

    if (empty($username_error) && empty($password_error) && empty($confirm_password_error)) {

        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

        if ($stmt = mysqli_prepare($conn, $sql)) {

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);

            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("location: login.php");
            } else {
                echo "Oops! Something wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management | Register</title>

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
        <h2>Sign Up</h2>
        <p>Please fill this from to create an account.</p>

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
                <label for="confirm_password">Confirm Password</label>
                <input type="password"
                    class="form-control <?php echo (!empty($confirm_password_error)) ? 'is-invalid' : '' ?>"
                    id="confirm_password" name="confirm_password" required>
                <span class="invalid-feedback"><?php echo $confirm_password_error ?></span>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary ml-2">Reset</button>
            </div>

            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>
</body>

</html>