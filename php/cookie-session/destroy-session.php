<?php

session_start();
session_destroy();

// unset

// if (isset($_SESSION["lastname"])) {
//     unset($_SESSION["lastname"]);
// }
// echo "<br>";

if (isset($_SESSION["firstname"])) {
    echo $_SESSION["firstname"] . "<br>";
}

if (isset($_SESSION["lastname"])) {
    echo $_SESSION["lastname"] . "<br>";
}

echo "Session Destroy";