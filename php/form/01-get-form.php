<?php

if (isset($_GET["name"]) || isset($_GET["email"])) {
    echo "Welcome " . $_GET["name"] . "<br>";
    echo "This is your email - " . $_GET["email"] . "<br>";
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

    <!-- GET Method -->
    <form action="<?php $_PHP_SELF ?>" method="GET">
        Name: <input type="text" name="name">
        Email: <input type="text" name="email">
        <input type="submit">
    </form>
</body>

</html>