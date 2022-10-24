<?php

// Return Values from a Function
function getSum($num1, $num2) // (3, 1) value
{
    // $colors = array("Red", "Green", "Blue", "Yellow");
    // for ($i = 0; $i < count($colors); $i++) {
    //     echo $colors[$i] . "<br>";
    // }

    $total = $num1 + $num2;
    if ($total > 5) {
        return "<p style=\" color: blue; \">Total value is $total and greater than 5!</p>";
    } else {
        return "<p style=\" color: red; \">Total value is $total and less than 5!</p>";
    }
}

$a = 3;
$b = 1;
echo getSum($a, $b); // Passed by value;
// echo "<br>";

echo getSum(2, 7);
// echo "<br>";

echo getSum(1, 6);
// echo "<br>";