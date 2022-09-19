<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
    .danger-color {
        color: red;
    }
    </style>
</head>

<body>
    <?php

    $name = "";
    $email = "";
    $website = "";

    $nameErr = "";
    $emailErr = "";

    // empty() // Empty ?

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_REQUEST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = $_REQUEST["name"];
        }

        if (!empty($_REQUEST["email"])) {
            $email = $_REQUEST["email"];
        } else {
            $emailErr = "Email is required";
        }

        if (!empty($_REQUEST["website"])) {
            $website = $_REQUEST['website'];
        }
    }

    ?>
    <h1>Form Example</h1>

    <p class="danger-color">All star(*) fields are required!!!</p>

    <!-- POST Method -->
    <form action="<?php $_PHP_SELF ?>" method="POST">
        Name: <input type="text" name="name"><span class="danger-color"> * <?php echo $nameErr ?></span>
        <br><br>
        Email: <input type="text" name="email"><span class="danger-color"> * <?php echo $emailErr ?></span>
        <br><br>
        Website: <input type="text" name="website">
        <br><br>
        <input type="submit">
    </form>
    <br>

    <?php
    echo ($name != "" && $email != "") ? "Name: $name <br>" : "";
    echo ($name != "" && $email != "") ? "Email: $email <br>" : "";
    echo $website == "" ? "" : "Website: $website <br>";
    ?>
</body>

</html>