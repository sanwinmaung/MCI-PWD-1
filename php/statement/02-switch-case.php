<?php

// switch(n) {
//     case one:
//         Execute code
//         break;
//     case two:
//         Execute code
//         break;
//     ...
//     default:
//         Execute code
// }

// Ctrl + Shift + p

$d = date("D"); // Wed;
$d = "Frifefefe";

switch ($d) {
    case "Mon":
        echo "Today is Monday!";
        break;
    case "Tue":
        echo "Today is Tue!";
        break;
    case "Wed":
        echo "Today is Wed!";
        break;
    case "Thu":
        echo "Today is Thu!";
        break;
    case "Fri":
        echo "Today is Fri!";
        break;
    case "Sat":
        echo "Today is Sat!";
        break;
    case "Sun":
        echo "Today is Sun!";
        break;
    default:
        $a = 1;
        $b = 2;
        echo $a + $b;
        echo "<br>";
        echo "No information!";
        break;
}