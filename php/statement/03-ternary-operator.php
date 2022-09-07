<?php

// Ternary Operator (?)

$d = date("D");

if($d == "Fri") {
    echo "Yayy TGIF!";
} else {
    echo "No, today is " . $d . "!";
}

echo "<br>";

// condition ? 'execute if condition true' : 'execute if condition false';
$a = "One";
$b = "Three";
echo ($a == "One" or $b == "Two") ? "Yes" : "No";