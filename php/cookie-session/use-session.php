<?php

session_start();

if (isset($_SESSION["firstname"]) && isset($_SESSION["lastname"])) {
    echo "Hello " . $_SESSION["firstname"] . " " . $_SESSION["lastname"];
} else {
    echo "Hello everyone!";
}
echo "<br>";

echo "<a href='destroy-session.php'>Delete Session</a>";
echo "<br>";