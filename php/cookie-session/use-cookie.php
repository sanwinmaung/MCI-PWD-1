<?php

setcookie("username", null, time() - 3600);


echo "Test Cookie Exist!";
echo "<br>";

if (isset($_COOKIE["username"])) {
    echo "Hi " . $_COOKIE["username"];
} else {
    echo "Welcome anyone!";
}
echo "<br>";

echo "<a href='destroy-cookie.php'>Delete Cookie</a>";
echo "<br>";