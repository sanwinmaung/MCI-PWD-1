<?php

// PHP Cookie
// cookie store in web browser
// name, value, expire, path, domain, secure
// setcookie(name, value, expire, path, domain, secure);
// mendatory fiels => name;
// 4Kb
setcookie("username", "John Doe", time() + (60 * 60));

if (isset($_COOKIE["username"])) {
    echo "Hi " . $_COOKIE["username"];
} else {
    echo "Welcome anyone!";
}
echo "<br>";

// setcookie("username", "", time() - 3600);

if (isset($_COOKIE["username"])) {
    echo "Hi " . $_COOKIE["username"];
} else {
    echo "Welcome anyone!";
}
echo "<br>";