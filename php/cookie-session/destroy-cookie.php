<?php

setcookie("username", "", time() - 3600);


if (isset($_COOKIE["username"])) {
    echo "Hi " . $_COOKIE["username"];
} else {
    echo "Cookie Expired!";
}

// Destroy Cookie
// setcookie("username", "", time() - 3600);