<?php

if (isset($_REQUEST["name"]) || isset($_REQUEST["email"])) {
    echo "Welcome " . $_REQUEST["name"] . "<br>";
    echo "This is your email - " . $_REQUEST["email"] . "<br>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Form Example</h1>

    <!-- POST Method -->
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
        Name: <input type="text" name="name">
        Email: <input type="text" name="email">
        <input type="submit">
    </form>
</body>

</html>